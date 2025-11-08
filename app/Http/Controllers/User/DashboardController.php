<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\MoneyRequest;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard.user-dashboard');
    }

    public function transaction()
    {
        $user = auth()->user();
        $transactionItems = Transaction::where('user_id', $user->id)->latest()->get();

        $settings = Setting::first();

        return view('user.dashboard.transaction', compact('settings', 'transactionItems'));
    }
    public function viewSendMoney(Request $request)
    {
        $settings = Setting::first();
        return view('user.dashboard.send-money', [
            'fixedCharge' => $settings->send_money_fixed_charge ?? '',
            'percentCharge' => $settings->send_money_percent_charge
        ]);
    }

    public function sendMoney(Request $request)
    {
        // step 1: validation
        // step 2: check user balance
        // step 3: find receiver user by email
        // step 4: Cut balance from sender user
        // step 5: Create transaction for sender user
        // step 6: Add balance to receiver user
        // step 7: Create transaction for receiver user
        // step 8: return back with success;

        $request->validate([
            'send_money_email' => [
                'required',
                'email',
                'exists:users,email',
                function ($attribute, $value, $fail) {
                    if ($value === auth()->user()->email) {
                        $fail("You can't send money to your own email address.");
                    }
                },
            ],
            'amount' => 'required|numeric|gt:0'
        ]);
        $settings = Setting::first();
        $fixedCharge = $settings->send_money_fixed_charge;
        $percentCharge = $settings->send_money_percent_charge;
        $percentCalculate = $request->amount * $percentCharge / 100;
        $totalCharge = $percentCalculate + $fixedCharge;
        $totalCalculate = $request->amount + $totalCharge;


        $user = auth()->user();
        if ($user->balance >= $totalCalculate) {
            $receiverUser = User::where('email', $request->send_money_email)->first();
            $user->balance = $user->balance - $request->amount;
            $user->save();

            $trx = trxGenerator();
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $request->amount;
            $transaction->type = '-';
            $transaction->post_balance = $user->balance;
            $transaction->details = "Send money to {$receiverUser->email}";
            $transaction->trx = $trx;
            $transaction->remarks = 'send_money';
            $transaction->save();

            $user->balance = $user->balance - $totalCharge;
            $user->save();
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $totalCharge;
            $transaction->type = '-';
            $transaction->post_balance = $user->balance;
            $transaction->details = "Send money to {$receiverUser->email}";
            $transaction->trx = $trx;
            $transaction->remarks = 'send_money_charge';
            $transaction->save();

            $receiverUser->balance = $receiverUser->balance + $request->amount;
            $receiverUser->save();

            $transaction = new Transaction();
            $transaction->user_id = $receiverUser->id;
            $transaction->amount = $request->amount;
            $transaction->type = '+';
            $transaction->post_balance = $receiverUser->balance;
            $transaction->details = "Received money from {$user->email}";
            $transaction->trx = $trx;
            $transaction->remarks = 'received_money';
            $transaction->save();
            return back()->withSuccess('Send money successful');
        } else {
            return back()->withErrors('Cannot send money with insufficient balance');
        }
    }


    public function sendMoneyHistory()
    {
        $transactions = Transaction::where('user_id', auth()->id())->where('remarks', 'send_money')->latest()->get();
        return view('user.dashboard.send-money-history', compact('transactions'));
    }

    public function viewDeposit()
    {
        return view('user.dashboard.deposit');
    }
    public function sendDeposit(Request $request)
    {
        $request->validate([
            'deposit_amount' => 'required|gt:0',
            'document' => 'required'
        ]);
        $user = auth()->user();
        $deposits = new Deposit();
        $deposits->user_id = $user->id;
        $deposits->amount = $request->deposit_amount;
        $deposits->status = '0';
        $deposits->trx = trxGenerator();


        $supportedExt = ['jpg', 'jpeg', 'png', 'webp'];
        if ($request->hasFile('document')) {

            $document = $request->file('document');
            $extension = $document->getClientOriginalExtension();
            if (!in_array($extension, $supportedExt)) {
                return back()->withErrors(['extension' => 'Invalid document provided']);
            }
            $documentName = time() . '_' . $document->getClientOriginalName();
            $document->move('assets/admin/document/', $documentName);
            $deposits->document = 'assets/admin/document/' . $documentName;
        }

        $deposits->save();
        return to_route('user.deposit.history')->withSuccess('Your deposit request sent successfully');
    }
    public function depositHistory()
    {
        $deposits = Deposit::latest()->get();
        return view('user.dashboard.deposit-history', compact('deposits'));
    }
    public function viewWithdraw()
    {
        return view('user.dashboard.withdraw-money');
    }
    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:0',
            'transaction_number' => 'required'
        ]);
        $user = auth()->user();
        if ($user->balance >= $request->amount) {
            $withdraws = new Withdraw();
            $withdraws->user_id = $user->id;
            $withdraws->amount = $request->amount;
            $withdraws->transaction_number = $request->transaction_number;
            $withdraws->status = 0;
            $withdraws->trx = trxGenerator();
            $withdraws->save();
            return back()->withSuccess('Request sent Successfully');
        }
        return back()->withErrors('Insufficient balance');
    }
    public function withdrawHistory()
    {
        $withdraws = Withdraw::latest()->get();
        return view('user.dashboard.withdraw-history', compact('withdraws'));
    }
    public function viewMoneyRequest()
    {
        $settings = Setting::first();
        return view('user.dashboard.money-request', [
            'fixedCharge' => $settings->send_money_fixed_charge,
            'percentCharge' => $settings->send_money_percent_charge
        ]);
    }
    public function sendMoneyRequest(Request $request)
    {
        $request->validate([
            'money_request_email' => [
                'required',
                'email',
                'exists:users,email',
            ],
            'money_request_amount' =>
            [
                'required',
                'gt:0',
            ]
        ]);

        $user = auth()->user();
        $receiverUserId = User::where('email', $request->money_request_email)->first();
        $moneyRequest = new MoneyRequest();
        $moneyRequest->user_id = $user->id;
        $moneyRequest->receiver_id = $receiverUserId->id;
        $moneyRequest->amount = $request->money_request_amount;
        $moneyRequest->status = 0;
        $moneyRequest->trx = trxGenerator();
        $moneyRequest->save();
        return back()->withSuccess('Money request sent successfully');
    }
    public function pendingMoneyRequest()
    {
        $user = auth()->user();
        $moneyRequests = MoneyRequest::where('receiver_id', $user->id)->with('user')->where('status', 0)->latest()->get();
        $settings = Setting::first();
        return view('user.dashboard.pending-money-request', compact('moneyRequests'));
    }
    public function acceptMoneyRequest(Request $request, $id)
    {

        $receiver = auth()->user();
        $acceptMoneyRequest = MoneyRequest::where('receiver_id', $receiver->id)->findOrFail($id);

        if ($receiver->balance < $acceptMoneyRequest->amount) {
            return back()->withErrors('Insufficient balance');
        }


        $settings = Setting::first();
        $fixedCharge = $settings->send_money_fixed_charge;
        $percentCharge = $settings->send_money_percent_charge;
        $percentCalculate = $request->amount * $percentCharge / 100;

        $totalCharge = $percentCalculate + $fixedCharge;
        $totalCalculate = $request->amount - $totalCharge;
    


        $receiver->balance += $totalCalculate;
        $receiver->save();

        $user = User::find($acceptMoneyRequest->user_id);
        $user->balance -=  $acceptMoneyRequest->amount;
        $user->save();

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $acceptMoneyRequest->amount;
        $transaction->type = '-';
        $transaction->post_balance = $user->balance;
        $transaction->details = 'Money sent successfully';
        $transaction->remarks = 'sent_request_amount';
        $transaction->trx = trxGenerator();
        $transaction->save();

        $transaction = new Transaction();
        $transaction->user_id = $acceptMoneyRequest->receiver_id;
        $transaction->amount = $totalCalculate;
        $transaction->type = '+';
        $transaction->post_balance = $receiver->balance;
        $transaction->details = 'Money sent successfully';
        $transaction->remarks = 'sent_request_amount';
        $transaction->trx = trxGenerator();
        $transaction->save();


        $acceptMoneyRequest->status = 1;
        $acceptMoneyRequest->save();

        return back()->withSuccess('Request amount sent successfully');
    }
    public function rejectMoneyRequest(Request $request, $id)
    {
        $moneyRequest = MoneyRequest::where('id', $id)->where('status', 0)->firstOrFail();
        $moneyRequest->status = 2;
        $moneyRequest->reason = $request->reason;
        $moneyRequest->save();
        return back()->withSuccess('Request reject successfully');
    }
    public function moneyRequestHistory()
    {
        $user = auth()->user();
        $moneyRequests = MoneyRequest::where('user_id', $user->id)->with('user')->latest()->get();
        return view('user.dashboard.money-request-history', compact('moneyRequests'));
    }
}
