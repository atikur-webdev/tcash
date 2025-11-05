<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
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

    public function pendingDeposit(Request $request)
    {
        $depositRequests = Deposit::where('status', 0)->with('user')->get();
        return view('admin.pending-deposit', compact('depositRequests'));
    }

    public function depositAccept(Request $request, $id)
    {
        $acceptDeposit = Deposit::where('status', 0)->where('id', $id)->firstOrFail();
        $acceptDeposit->status = 1;
        $acceptDeposit->save();

        $user = User::findOrFail($acceptDeposit->user_id);
        $user->balance = $user->balance + $acceptDeposit->amount;
        $user->save();

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $acceptDeposit->amount;
        $transaction->type = '+';
        $transaction->post_balance = $user->balance;
        $transaction->details = 'New balance added';
        $transaction->trx = trxGenerator();
        $transaction->save();

        return back()->withSuccess('Amount sent successfully');
    }
    public function rejectDeposit($id) {
    
        // $rejectDeposit = Deposit::destroy($id);
        $rejectDeposit = Deposit::where('id', $id)->where('status', 0)->update(['status' => 2]);
        return back()->withSuccess('Request rejected successfully');
    }
    public function successDeposit() {
        $successDeposits = Deposit::where('status', 1)->with('user')->get();
        return view('admin.success-deposit', compact('successDeposits'));
    }
    public function showRejectDeposit() {
        $rejectDeposits = Deposit::where('status', 2)->with('user')->get();
        return view('admin.reject-deposit', compact('rejectDeposits'));
    }
}
