<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\ReferLevel;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
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
        $transaction->remarks = 'new_balance_added';
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
        $transaction->remarks = 'balance_subtracted';
        $transaction->save();

        return back()->withSuccess('Balance subtracted successfully');
    }
    public function allDeposit()
    {
        $allDeposits = Deposit::latest()->get();
        return view('admin.all-deposit', compact('allDeposits'));
    }

    public function pendingDeposit()
    {
        $depositRequests = Deposit::where('status', 0)->with('user')->latest()->get();
        return view('admin.pending-deposit', compact('depositRequests'));
    }

    public function depositAccept(Request $request, $id)
    {
        $acceptDeposit = Deposit::with('user')->where('status', 0)->where('id', $id)->firstOrFail();
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
        $transaction->details = 'New deposit';
        $transaction->remarks = 'new_deposit_balance_added';
        $transaction->trx = trxGenerator();
        $transaction->save();

        $user = $acceptDeposit->user;
        $level = 1;

        while ($user->referred_by) {
            $referredUser = $user->referred_by;
            $referredByUser = User::where('id', $referredUser)->first();
            $referLevel = ReferLevel::where('level', $level)->first();
            $calculation = $acceptDeposit->amount * $referLevel->percent_amount / 100;
            $referredByUser->balance += $calculation;
            $referredByUser->save();
       
            $level++;
            if ($user->referred_by === 0) break;
            $user = $referredByUser;

            $transaction = new Transaction();
            $transaction->user_id = $referredByUser->id;
            $transaction->amount = $calculation;
            $transaction->type = '+';
            $transaction->post_balance = $referredByUser->balance;
            $transaction->details = 'Refer amount added to your balance';
            $transaction->remarks = 'new_refer_balance_added';
            $transaction->trx = trxGenerator();
            $transaction->save();
        }

        return back()->withSuccess('Amount sent successfully');
    }
    public function rejectDeposit(Request $request, $id)
    {
        // $rejectDeposit = Deposit::destroy($id);
        // $rejectDeposit = Deposit::where('id', $id)->where('status', 0)->update(['status' => 2]);
        $rejectDeposit = Deposit::where('id', $id)->where('status', 0)->firstOrFail();
        $rejectDeposit->status = 2;
        $rejectDeposit->save();
        return back()->withSuccess('Request rejected successfully');
    }
    public function successDeposit()
    {
        $successDeposits = Deposit::where('status', 1)->with('user')->get();
        return view('admin.success-deposit', compact('successDeposits'));
    }
    public function showRejectDeposit()
    {
        $rejectDeposits = Deposit::where('status', 2)->with('user')->get();
        return view('admin.reject-deposit', compact('rejectDeposits'));
    }
    public function allWithdraw()
    {
        $allWithdraws = Withdraw::latest()->get();
        return view('admin.all-withdraw', compact('allWithdraws'));
    }
    public function viewPendingWithdraw()
    {
        $withdraws = Withdraw::where('status', 0)->latest()->get();
        return view('admin.pending-withdraw', compact('withdraws'));
    }
    public function acceptPendingWithdraw(Request $request, $id)
    {
        $withdraws = Withdraw::where('id', $id)->with('user')->where('status', 0)->firstOrFail();
        $withdraws->status = 1;
        $withdraws->save();
        $user = $withdraws->user;
        $user->balance = $user->balance - $withdraws->amount;
        $user->save();

        $transaction = new Transaction;
        $transaction->user_id = $user->id;
        $transaction->amount = $withdraws->amount;
        $transaction->type = '-';
        $transaction->post_balance = $user->balance;
        $transaction->details = 'Amount withdrawn';
        $transaction->trx = trxGenerator();
        $transaction->remarks = 'withdrawn_successful';
        $transaction->save();

        return back()->withSuccess('Request accepted successfully');
    }
    public function rejectWithdraw($id)
    {
        $user = auth()->user();
        $rejectWithdraws = Withdraw::where('id', $id)->where('status', 0)->firstOrFail();
        $rejectWithdraws->status = 2;
        $rejectWithdraws->save();
        $user->balance += $rejectWithdraws->amount;
        $user->save();
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $rejectWithdraws->amount;
        $transaction->type = '+';
        $transaction->post_balance = $user->balance;
        $transaction->details = 'Withdraw balance back to user';
        $transaction->trx = trxGenerator();
        $transaction->remarks = 'withdraw_balance_back_to_user';
        $transaction->save();
        return back()->withSuccess('Withdraw request rejected successfully');
    }
    public function successWithdraw()
    {
        $successWithdraws = Withdraw::where('status', 1)->latest()->get();
        return view('admin.success-withdraw', compact('successWithdraws'));
    }
    public function viewRejectWithdraw()
    {
        $rejectWithdraws = Withdraw::where('status', 2)->latest()->get();
        return view('admin.reject-withdraw', compact('rejectWithdraws'));
    }
    public function viewLevel()
    {
        $levels = ReferLevel::get();
        return view('admin.level.levels', compact('levels'));
    }
    public function referLevel(Request $request)
    {
        $request->validate([
            'percentage' => 'required|numeric|gt:0'
        ]);
        $nextLevel = ReferLevel::max('level') + 1;
        $referLevels = new ReferLevel();
        $referLevels->level = $nextLevel;
        $referLevels->percent_amount = $request->percentage;
        $referLevels->save();
        return back()->withSuccess('Level and percentage set successfully');
    }
    public function editReferLevel(Request $request, $level)
    {
        $level = ReferLevel::where('level', $level)->firstOrFail();
        $level->percent_amount = $request->percentage;
        $level->save();
        return back()->withSuccess('Percentage updated successfully');
    }
    public function deleteReferLevel($level)
    {
        $levels = ReferLevel::where('level', $level)->firstOrFAil();
        $levels->delete();
        $remainingLevels = ReferLevel::orderBy('level')->get();
        $counter = 1;
        foreach ($remainingLevels as $level) {
            $level->update(['level' => $counter]);
            $counter++;
        }
        return back()->withSuccess('Level deleted successfully');
    }
}


// if ($referredUser) {
//     $isUser = User::where('id', $referredUser)->first();
//     $calculation = $acceptDeposit->amount * $levels->percent_amount / 100;
//     $isUser->balance += $calculation;
//     $isUser->save();
// }