<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dps;
use App\Models\Installment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserDps;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserDpsController extends Controller
{
    public function viewDpsPlan()
    {
        $dps = Dps::where('disable', 0)->get();
        return view('user.dashboard.view-dps-plan', compact('dps'));
    }
    public function applyDpsPlan($id)
    {
        $dps = Dps::where('id', $id)->firstOrFail();
        $user = auth()->user();
        $userDpsData = new UserDps();
      
        if ($user->balance >= $dps->per_installment) {
            $user->balance -= $dps->per_installment;
            $user->save();
            $userDpsData->user_id = $user->id;
            $userDpsData->dps_id = $dps->id;
            $userDpsData->installment_interval = $dps->installment_interval;
            $userDpsData->total_installment = $dps->total_installment;
            $userDpsData->per_installment = $dps->per_installment;
            $userDpsData->interest_rate = $dps->interest_rate;
            $userDpsData->given_installment = 1;
            $userDpsData->save();

            $installment = new Installment();
            $installment->user_id = $user->id;
            $installment->dps_id = $dps->id;
            $installment->total_installment += 1;
            $installment->amount = $userDpsData->per_installment;
            $installment->payment_date = now();
            $installment->save();       
     

            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $userDpsData->per_installment;
            $transaction->type = '-';
            $transaction->post_balance = $user->balance;
            $transaction->details = 'Installment cut from your balance';
            $transaction->trx = trxGenerator();
            $transaction->remarks = 'installment_cut';
            $transaction->save();
            
            return to_route('user.view.applied.dps.plan')->withSuccess('Dps activate successfully');

        }
        return back()->withErrors('Insufficient balance');
    }

    public function viewAppliedDpsPlan()
    {
        // $today = Carbon::now();
        // $user = User::with('userDps')->where('id', auth()->id())->get();
        // $userDps = $user->userDps->first();
        $userDps = UserDps::where('user_id', auth()->id())->with('dps')->get();
  

        // $created_at = Carbon::parse($userDps->created_at)->format('Y-m-d');
        // $curr_date = $created_at == $today->toDateString();
        // $next30Days = $today->addMonths(1);

        // if ($curr_date == $next30Days) {
        //     $user = User::where('id', auth()->id())->firstOrFail();
        //     $user->balance -= $userDps->per_installment;
        //     $user->save();
        // }
        return view('user.dashboard.view-applied-dps', compact('userDps'));
    }
}
