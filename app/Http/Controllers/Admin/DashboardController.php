<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'Dashboard';
        return view('admin.dashboard', compact('pageTitle'));
    }
    public function viewUserList()
    {
        $users = User::get();

        $settings = Setting::first();

        return view('admin.user-list', compact('users', 'settings'));
    }

    public function balanceSend(Request $request, $id)
    {
        $user =  User::findOrFail($id);
        $user->balance = $user->balance + $request->balance;
        $user->save();

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $request->balance;
        $transaction->type = '+';
        $transaction->post_balance = $user->balance;
        $transaction->details = "New balance added";
        $transaction->trx = trxGenerator();
        $transaction->save();

        return back()->withSuccess('Balance added successfully');
    }

    public function balanceSubtract(Request $request, $id)
    {
        $user =  User::findOrFail($id);
        if ($user->balance >= $request->subtract_balance) {
            $user->balance = $user->balance - $request->subtract_balance;
        } else {
            return back()->withErrors('Cannot subtracted minus balance');
        }
        $user->save();

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $request->subtract_balance;
        $transaction->type = '-';
        $transaction->post_balance = $user->balance;
        $transaction->details = 'Balance subtracted';
        $transaction->trx = trxGenerator();
        $transaction->save();

        return back()->withSuccess('Balance subtracted successfully');
    }
}
