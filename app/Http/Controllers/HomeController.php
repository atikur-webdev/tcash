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

        $bannerElements = Section::where('data_key', 'banner-element')->get();

        $bannerContent = Section::where('data_key', 'banner-content')->first();

        $aboutElements = Section::where('data_key', 'about-element')->get();

        $aboutContent = Section::where('data_key', 'about-content')->first();

        $featureContent = Section::where('data_key', 'feature-content')->first();

        $statisticElement = Section::where('data_key', 'statistic-element')->get();

        $chooseContent = Section::where('data_key', 'choose-content')->first();

        $chooseElement = Section::where('data_key', 'choose-element')->get();

        $serviceContent = Section::where('data_key', 'service-content')->first();

        $serviceElement = Section::where('data_key', 'service-element')->get();

        $projectContent = Section::where('data_key', 'project-content')->first();

        $projectElement = Section::where('data_key', 'project-element')->get();

        $teamContent = Section::where('data_key', 'team-content')->first();

        $teamElement = Section::where('data_key', 'team-element')->get();

        $testimonialContent = Section::where('data_key', 'testimonial-content')->first();

        $testimonialElement = Section::where('data_key', 'testimonial-element')->get();

        $footerContent = Section::where('data_key', 'footer-content')->first();

        return view('home', compact('bannerElements', 'bannerContent', 'aboutElements', 'aboutContent', 'featureContent', 'statisticElement', 'chooseContent', 'chooseElement', 'serviceContent', 'serviceElement', 'projectContent', 'projectElement', 'teamContent', 'teamElement', 'testimonialContent', 'testimonialElement', 'footerContent'));
    }
}
