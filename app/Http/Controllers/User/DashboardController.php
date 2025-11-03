<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {

        $siteSettingContent = Section::where('data_key', 'siteSetting-content')->first();

        $siteSettingElement = Section::where('data_key', 'siteSetting-element')->get();

        $footerContent = Section::where('data_key', 'footer-content')->first();

        return view('user.dashboard.dashboard', compact('siteSettingContent', 'siteSettingElement', 'footerContent'));
    }

    public function transaction()
    {
        $siteSettingContent = Section::where('data_key', 'siteSetting-content')->first();

        $siteSettingElement = Section::where('data_key', 'siteSetting-element')->get();

        $footerContent = Section::where('data_key', 'footer-content')->first();

        return view('user.dashboard.transaction', compact('siteSettingContent', 'siteSettingElement', 'footerContent'));
    }
}
