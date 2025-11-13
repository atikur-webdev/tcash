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
        $dps = Dps::get();
        return view('user.dashboard.view-dps-plan', compact('dps'));
    }
    public function applyDpsPlan($id)
    {
        $dps = Dps::where('id', $id)->with('userDps')->firstOrFail();
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
            $userDpsData->active = 1;
            $userDpsData->next_payment_date = now()->addDays($dps->installment_interval)->format('Y-m-d');
            $userDpsData->save();


          

            $installment = new Installment();
            $installment->user_id = $user->id;
            $installment->user_dps_id = $userDpsData->id;
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
        $userDps = UserDps::where('user_id', auth()->id())->with('dps')->get();
        return view('user.dashboard.view-applied-dps', compact('userDps'));
    }
    public function viewDpsDetails($id)
    {
        $userDps = UserDps::where('user_id', auth()->id())->findOrFail($id);
        $installments = Installment::where('user_id', auth()->id())->where('user_dps_id', $userDps->id)->with('userDps')->get();

        return view('user.dashboard.view-dps-details', compact('installments'));
    }
}
