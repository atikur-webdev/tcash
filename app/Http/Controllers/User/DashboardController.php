<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard.user-dashboard');
    }

    public function transaction()
    {
        $transactionItems = Transaction::get();

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

            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $request->amount;
            $transaction->type = '-';
            $transaction->post_balance = $user->balance;
            $transaction->details = "Send money to {$receiverUser->email}";
            $transaction->trx = trxGenerator();
            $transaction->remarks = $request->remarks;
            $transaction->save();

            $receiverUser->balance = $receiverUser->balance + $request->amount;
            $receiverUser->save();

            $transaction = new Transaction();
            $transaction->user_id = $receiverUser->id;
            $transaction->amount = $request->amount;
            $transaction->type = '+';
            $transaction->post_balance = $user->balance;
            $transaction->details = "Received money from {$user->email}";
            $transaction->trx = trxGenerator();
            $transaction->save();
            return back()->withSuccess('Send money successful');
        } else {
            return back()->withErrors('Cannot send money with insufficient balance');
        }
    }
    public function sendMoneyHistory()
    {
       $transaction = Transaction::where('user_id', auth()->id)->where('type', '-')->where('details', 'like', 'send money to %')->latest()->get();
        return view('user.dashboard.send-money-history', compact('transactions'));
    }
}
