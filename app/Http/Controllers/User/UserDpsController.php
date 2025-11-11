<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dps;
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
        $user = User::with('dps')->where('id', auth()->id())->first();
        $userDpsData = $user->dps->first();

        dd($user);
        

        $userDps = new UserDps();
      
        
        if ($user->balance >= $dps->per_installment) {
            $user->balance -= $dps->per_installment;
            $user->save();
            $userDps->user_id = $user->id;
            $userDps->dps_name = $userDpsData->dps_name;
            


            $userDps->installment_interval = $userDpsData->installment_interval;
            $userDps->total_installment = $userDpsData->total_installment;
            $userDps->per_installment = $userDpsData->per_installment;
            $userDps->interest_rate = $userDpsData->interest_rate;
            $userDps->given_installment = 1;
            $userDps->save();
            dd($userDps);
        }
        return back()->withSuccess('Dps activate successfully');
    }

    public function viewAppliedDpsPlan()
    {
        $today = Carbon::now();
        $userDps = UserDps::where('user_id', auth()->id())->first();
        $created_at = Carbon::parse($userDps->created_at)->format('Y-m-d');
        $curr_date = $created_at == $today->toDateString();
        $next30Days = $today->addMonths(1);

        if ($curr_date == $next30Days) {
            $user = User::where('id', auth()->id())->firstOrFail();
            $user->balance -= $userDps->per_installment;
            $user->save();
        }
        return view('user.dashboard.view-applied-dps', compact('userDps'));
    }
}
