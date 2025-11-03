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

        $featureElement = Section::where('data_key', 'feature-element')->get();

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

        $siteSettingContent = Section::where('data_key', 'siteSetting-content')->first();

        $siteSettingElement = Section::where('data_key', 'siteSetting-element')->get();

        return view('home', compact('bannerElements', 'bannerContent', 'aboutElements', 'aboutContent', 'featureElement', 'statisticElement', 'chooseContent', 'chooseElement', 'serviceContent', 'serviceElement', 'projectContent', 'projectElement', 'teamContent', 'teamElement', 'testimonialContent', 'testimonialElement', 'footerContent', 'siteSettingContent', 'siteSettingElement'));
    }
    public function viewAbout() {

        $aboutElements = Section::where('data_key', 'about-element')->get();

        $aboutContent = Section::where('data_key', 'about-content')->first();

        $featureElement = Section::where('data_key', 'feature-element')->get();

        $statisticElement = Section::where('data_key', 'statistic-element')->get();

        $teamContent = Section::where('data_key', 'team-content')->first();

        $teamElement = Section::where('data_key', 'team-element')->get();

        $testimonialContent = Section::where('data_key', 'testimonial-content')->first();

        $testimonialElement = Section::where('data_key', 'testimonial-element')->get();

        $footerContent = Section::where('data_key', 'footer-content')->first();

        $siteSettingContent = Section::where('data_key', 'siteSetting-content')->first();

        $siteSettingElement = Section::where('data_key', 'siteSetting-element')->get();

        $breadcrumbContent = Section::where('data_key', 'breadcrumb-content')->first();

        return view('about', compact('aboutElements', 'aboutContent', 'featureElement', 'statisticElement', 'teamContent', 'teamElement', 'testimonialContent', 'testimonialElement', 'footerContent', 'siteSettingContent', 'siteSettingElement', 'breadcrumbContent'));
    }

    public function viewService() {

        $siteSettingContent = Section::where('data_key', 'siteSetting-content')->first();

        $siteSettingElement = Section::where('data_key', 'siteSetting-element')->get();

        $footerContent = Section::where('data_key', 'footer-content')->first();

        $serviceContent = Section::where('data_key', 'service-content')->first();

        $serviceElement = Section::where('data_key', 'service-element')->get();

        $breadcrumbContent = Section::where('data_key', 'breadcrumb-content')->first();

        return view('service', compact('siteSettingElement', 'siteSettingContent', 'footerContent', 'serviceContent', 'serviceElement', 'breadcrumbContent'));
    }
    
    public function viewContact() {

        $siteSettingContent = Section::where('data_key', 'siteSetting-content')->first();

        $siteSettingElement = Section::where('data_key', 'siteSetting-element')->get();

        $footerContent = Section::where('data_key', 'footer-content')->first();

        $breadcrumbContent = Section::where('data_key', 'breadcrumb-content')->first();

        return view('contact', compact('siteSettingContent', 'siteSettingElement', 'footerContent', 'breadcrumbContent'));
    }
}
