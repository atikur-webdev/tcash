<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\Transaction;
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
        $userDps = UserDps::with('user')->get();

        foreach ($userDps as $dps) {
            $installment = Installment::where('user_id', $dps->user_id)->where('user_dps_id', $dps->dps_id)->latest()->first();

            if (empty($installment)) {
                continue;
            }
            
            $user = $dps->user;
            $installmentDate = Carbon::parse($dps->curr_date);
            $nextInstallmentDate = carbon::parse($dps->curr_date)->addDays($dps->installment_interval);

            if ($installmentDate <= now() && $user->balance > $dps->per_installment) {
                $user->balance -= $dps->per_installment;
                $user->save();
                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->amount = $dps->per_installment;
                $transaction->type = '-';
                $transaction->post_balance = $user->balance;
                $transaction->details = 'Dps amount subtracted';
                $transaction->remarks = 'dps_amount_subtracted';
                $transaction->trx = trxGenerator();
                $transaction->save();

                $interest = $dps->per_installment * 10 / 100;
                $user->balance += $interest;
                $user->save();
                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->amount = $interest;
                $transaction->type = '+';
                $transaction->post_balance = $user->balance;
                $transaction->details = 'Per dps interest added';
                $transaction->remarks = 'per_dps_added';
                $transaction->trx = trxGenerator();
                $transaction->save();

                // increment installment and change date
                $installment = new Installment();
                $installment->user_id       = $user->id;
                $installment->user_dps_id   = $dps->id;
                $installment->amount = $dps->per_installment;
                $installment->total_installment = 1;
                $installment->payment_date = now()->format('Y-m-d');
                $installment->save();

                $dps->given_installment += 1;
                $dps->curr_date = $nextInstallmentDate;
                $dps->save();

            };

        }
    }
}



// foreach ($userDps as $dps) {
    // $installments = Installment::where('user_id', $dps->user_id)->where('dps_id', $dps->dps_id)->first();
    // $installmentDate = $installments->payment_date;
    // $today = now()->startOfDay();
    // $lastPaymentDate = Carbon::parse($installments->payment_date)->startOfDay();
    // $dayPassed = $today->diffInDays($lastPaymentDate, false);

    // if($dayPassed >= 30) {
    //     $dps->user->balance -= $dps->per_installment;
    //     $dps->user->save();
    //     $installments->amount += $dps->per_installment;
    //     $installments->total_installment += 1;
    //     $installments->save();
    // }
// }




            // $curr_date = $today->format('Y-m-d');

            // $next30Days = $today->copy()->addDays(30);

            // dd($installmentDate, $next30Days->format('Y-m-d'));

            // if (Carbon::parse($installmentDate)->format('Y-m-d') == $next30Days->format('Y-m-d')) {
            //     info('hoice');
            //     $dps->user->balance -= $dps->per_installment;
            //     $dps->user->save();
            //     $installments->amount += $dps->per_installment;
            //     $installments->total_installment += 1;
            //     $installments->save();
            // }
//         }
//     }
// }

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
