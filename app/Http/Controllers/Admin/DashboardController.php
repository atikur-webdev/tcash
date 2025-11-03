<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'Dashboard';
        return view('admin.dashboard', compact('pageTitle'));
    }
    public function viewUserList() {
        $users = User::get();
        return view('admin.user-list', compact('users'));
    }
    public function balanceSend(Request $request, $id) {
        $balance =  User::findOrFail($id);
        $balance->balance = $request->balance;
        $balance->save();
        return back()->withSuccess('Balance added successfully');
    }
}
