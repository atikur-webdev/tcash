<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\User;
use App\Models\UserDps;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function installment()
    {
        $this->checkDate();
    }
    public function checkDate()
    {
        // $today = Carbon::now();
        $userId = auth()->id();

        $userDps = UserDps::with('user')->where('user_id', $userId)->get();

        foreach ($userDps as $dps) {

            $installments = Installment::where('user_id', $dps->user_id)->where('dps_id', $dps->dps_id)->first();
            $installmentDate = $installments->payment_date;
            $today = now();

            // $curr_date = $today->format('Y-m-d');

            $next30Days = $today->copy()->addDays(30);

            // dd($installmentDate, $next30Days->format('Y-m-d'));

            if (Carbon::parse($installmentDate)->format('Y-m-d') == $next30Days->format('Y-m-d')) {
                info('hoice');
                $dps->user->balance -= $dps->per_installment;
                $dps->user->save();
                $installments->amount += $dps->per_installment;
                $installments->total_installment += 1;
                $installments->save();
            }
        }
    }
}

        // foreach ($ as $date) {
        //     $user = User::where('id', auth()->id())->firstOrFail();
        //     $user->balance -= $userDps->per_installment;
        //     $user->save();
        //     $userDps->given_installment += 1;
        //     $userDps->save();
        // }


        // if ($curr_date >= $next30Days) {
        //     $user = User::where('id', auth()->id())->firstOrFail();
        //     $user->balance -= $userDps->per_installment;
        //     $user->save();
        //     $userDps->given_installment += 1;
        //     $userDps->save();
        // }
        // $givenInstallment = 1;
        // while ($givenInstallment > 0) {
        //     if ($curr_date >= $next30Days) {
        //         $user = User::where('id', auth()->id())->firstOrFail();
        //         $user->balance -= $userDps->per_installment;
        //         $user->save();
        //         $userDps->given_installment += 1;
        //         $userDps->save();
        //     }
        //     $givenInstallment++;
        //     if ($givenInstallment == $userDps->total_installment) break;
        // }
//     }
// }
// $today = Carbon::now();
// $userDps = $user->userDps->where('given_installment', 1)->first();
// $installmentDate = Carbon::parse($userDps->curr_date)->format('Y-m-d');
// $curr_date = $installmentDate == $today->toDateString();
// $next30Days = $today->addMonths(1);
// $nextInstallmentDate = $curr_date >= $next30Days;
// $user = User::with('userDps')->where('id', auth()->id())->first();



// $today = Carbon::now();
// $userDps = UserDps::where('user_id', auth()->id())->first();
// $installmentDate = Carbon::parse($userDps->curr_date)->format('Y-m-d') ?: '';
// // $curr_date = $today->toDateString();
// $next30Days = $today->addMonths(1);
// $user = User::with('userDps')->where('id', auth()->id())->get();
// // $userDpsDateCheck = $user->userDps->where('curr_date', $next30Days)->first();
// if ($installmentDate <= $next30Days) {
//     foreach ($user as $me) {
//         $me->balance -= $userDps->per_installment;
//         $me->save();
//         $userDps->given_installment += 1;
//         $userDps->save();
//     }
//     return back()->withErrors('You don\' have any other dps');
// }


//   public function checkDate()
//     {
//         $today = Carbon::now();
//         $userDps = UserDps::where()get();

//         $installmentDate = Carbon::parse($userDps->curr_date)->format('Y-m-d');
//         dd($installmentDate);
//         // $curr_date = $today->toDateString();
//         $next30Days = $today->addMonths(1);
//         $user = User::with('userDps')->where('id', auth()->id())->get();
//         // $userDpsDateCheck = $user->userDps->where('curr_date', $next30Days)->first();
//         if ($installmentDate <= $next30Days) {
//             foreach ($user as $me) {
//                 $me->balance -= $userDps->per_installment;
//                 $me->save();
//                 $userDpsData = $me->userDps->get();
//                 foreach($userDpsData as $dpsData) {
//                     dd($dpsData);
//                     $dpsData->given_installment += 1;
//                     $dpsData->save();
//                 }


//             }
//         }
