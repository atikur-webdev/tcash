<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dps;
use Illuminate\Http\Request;

class DpsController extends Controller
{
    public function viewDps() {
        $dps = Dps::latest()->get();
        return view('admin.view-dps', compact('dps'));
    }
    public function addDpsPlan(Request $request) {
        $request->validate([
            'name' => 'required', 
            'installment_interval' => 'required|numeric|gt:0', 
            'total_installment' => 'required|numeric|gt:0',
            'per_installment' => 'required|numeric|gt:0',
            'interest_rate' => 'required|numeric|gt:0',
        ]);
        $dps = new Dps();
        $dps->name = $request->name;
        $dps->installment_interval = $request->installment_interval;
        $dps->total_installment = $request->total_installment;
        $dps->per_installment = $request->per_installment;
        $dps->interest_rate = $request->interest_rate;
        $dps->save();
        return back()->withSuccess('New dps plan created successfully');
    }
    public function editDpsPlan(Request $request, $id) {
        $dps = Dps::findOrFail($id);
        $dps->name = $request->name;
        $dps->installment_interval = $request->installment_interval;
        $dps->total_installment = $request->total_installment;
        $dps->per_installment = $request->per_installment;
        $dps->interest_rate = $request->interest_rate;
        $dps->save();
        return back()->withSuccess('Dps plan edited successfully');
    }
    public function disableDpsPlan($id) {
        $dps = Dps::findOrFail($id);
        $dps->disable = 1;
        $dps->save();
        return back()->withSuccess('Dps disabled successfully');
    }
    public function enableDpsPlan($id) {
        $dps = Dps::findOrFail($id);
        $dps->disable = 0;
        $dps->save();
        return back()->withSuccess('Dps enabled successfully');
    }

}
