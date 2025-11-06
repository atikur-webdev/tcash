<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
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
        $transactionItems = Transaction::latest()->get();

        $settings = Setting::first();

        return view('user.dashboard.transaction', compact('settings', 'transactionItems'));
    }
    public function viewSendMoney(Request $request)
    {
        return view('user.dashboard.send-money');
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
            'amount' => 'required|integer|gt:0'
        ]);
        $user = auth()->user();
        if ($user->balance >= $request->amount) {
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

            $receiverUser->balance = $receiverUser->balance + $request->amount;
            $receiverUser->save();

            $transaction = new Transaction();
            $transaction->user_id = $receiverUser->id;
            $transaction->amount = $request->amount;
            $transaction->type = '+';
            $transaction->post_balance = $user->balance;
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
}
