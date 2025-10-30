<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $section = Section::query();

        $aboutSectionElements =(clone $section)->where('data_key','banner-element')->get();

        $aboutSectionContent = $section->where('data_key', 'banner-content')->first();

        return view('home', compact('aboutSectionElements', 'aboutSectionContent'));
    }
}
