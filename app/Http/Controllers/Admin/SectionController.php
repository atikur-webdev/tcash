<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SectionController extends Controller
{
    public function list()
    {
        $pageTitle = 'Sections';
        $sections = Section::get();
        return view('admin.sections.list', compact('pageTitle', 'sections'));
    }

    public function viewBanner()
    {
        $pageTitle = 'Banner';
        $sectionElements = Section::where('data_key', "banner-element")->get();
        return view('admin.sections.banner', compact('pageTitle', 'sectionElements'));
    }

    public function viewAbout()
    {
        $pageTitle = 'About Section';
        $sectionElements = Section::where('data_key', "about-element")->get();
        $sectionContent = Section::where('data_key', "about-content")->first();
        return view('admin.sections.about-edit', compact('pageTitle', 'sectionElements', 'sectionContent'));
    }

    public function viewFeature()
    {
        $pageTitle = 'Feature Section';
        $sectionElements = Section::where('data_key', 'feature-element')->get();
        return view('admin.sections.feature', compact('pageTitle', 'sectionElements'));
    }

    public function viewStatistic() {
        $pageTitle = 'Statistic Section';
        $sectionContent = Section::where('data_key', 'statistic-content')->first();
        $sectionElements = Section::where('data_key', 'statistic-element')->get();
        return view('admin.sections.statistic', compact('sectionElements', 'sectionContent'));
    }

    public function viewChoose() {
        $pageTitle = 'Choose Us Section';
        $sectionContent = Section::where('data_key', 'choose-content')->first();
        $sectionElements = Section::where('data_key', 'choose-element')->get();
        return view('admin.sections.choose', compact('sectionContent', 'sectionElements'));
    }

    public function viewService() {
        $pageTitle = 'Service Section';
        $sectionContent = Section::where('data_key', 'service-content')->first();
   
        $sectionElements = Section::where('data_key', 'service-element')->get();
        return view('admin.sections.service', compact('pageTitle', 'sectionElements', 'sectionContent'));
    }

    public function viewProject() {
        $pageTitle = 'Project Section';
        $sectionContent = Section::where('data_key', 'project-content')->first();
        $sectionElements = Section::where('data_key', 'project-element')->get();
        return view('admin.sections.project', compact('pageTitle', 'sectionContent', 'sectionElements'));
    }

    public function viewTeam() {
        $pageTitle = 'Team Section';
        $sectionContent = Section::where('data_key', 'team-content')->first();
        $sectionElements = Section::where('data_key', 'team-element')->get();
        return view('admin.sections.team', compact('pageTitle', 'sectionElements', 'sectionContent'));
    }

    public function viewTestimonial() {
        $pageTitle = 'Testimonial Section';
        $sectionContent = Section::where('data_key', 'testimonial-content')->first();
        $sectionElements = Section::where('data_key', 'testimonial-element')->get();
        return view('admin.sections.testimonial', compact('pageTitle', 'sectionContent', 'sectionElements'));
    }

    public function viewFooter() {
        $pageTitle = 'Footer Section';
        $sectionContent = Section::where('data_key', 'footer-content')->first();
        $sectionElements = Section::where('data_key', 'footer-element')->get();
        return view('admin.sections.footer', compact('pageTitle', 'sectionContent', 'sectionElements'));
    }
    
    public function siteSetting() {
        $pageTitle = 'Site Setting';
        $sectionContent = Section::where('data_key', 'siteSetting-content')->first();
        $sectionElements = Section::where('data_key', 'siteSetting-element')->get();
        return view('admin.sections.site-setting', compact('pageTitle', 'sectionContent', 'sectionElements'));
    }

    public function viewBreadcrumb() {
        $pageTitle = 'BreadCrumb Section';
        $sectionContent = Section::where('data_key', 'breadcrumb-content')->first();
        return view('admin.sections.breadcrumb', compact('pageTitle', 'sectionContent'));
    }

    public function storeSingle(Request $request, $key)
    {
        $section = Section::firstOrCreate(
            ['data_key' => $key . '-content'],
            ['data_value' => []]
        );
       
        $section->data_value = $request->except('_token');

        $supportedExt = ['jpg', 'jpeg', 'png', 'webp'];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, $supportedExt)) {
                throw new Exception('File not found');
            }
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/images/', $fileName);
            $section->data_value = array_merge((array)$section->data_value ?? [], [
                'file' => $fileName
            ]);
        }
        $section->save();
        return back()->with('Updated Successfully');
    }

    public function store(Request $request, $key)
    {
        $data = $request->except('_token');

        $supportedExt = ['jpg', 'jpeg', 'png', 'webp'];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, $supportedExt)) {
                throw new Exception('File not found');
            }
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/images/', $fileName);
            $data['file'] = $fileName;
        }
        $section = new Section();
        $section->data_key = $key . "-element";
        $section->data_value = $data;

        $section->save();
        return back()->with('Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);

        $data = $request->except('_token', '_method');
   
        $supportedExt = ['jpg', 'jpeg', 'png', 'webp'];
        if ($request->hasFile('file')) {

            $existsFile = base_path('assets/images/' . $section->data_value->file);

            if (File::exists($existsFile)) {
                File::delete($existsFile);
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, $supportedExt)) {
                throw new Exception('File not found');
            }
            
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/images/', $fileName);
            $data['file'] = $fileName;
        }

        if(!$request->hasFIle('file')) {
           $oldFile = $section->data_value?->file ?? null;
           $data['file'] = $oldFile;
        }

        $section->update(['data_value' => $data]);
        return back()->with('Edited Successfully');
    }

    public function delete($id)
    {
        $section = Section::findOrFail($id);

        $fileName = $section->data_value->file ?? null;

        if($fileName) {
            $existsFile = base_path('assets/images/' . $section->data_value->file ?? '');
            if (File::exists($existsFile)) {
                File::delete($existsFile);
            }
        }

        $section->delete();
        return back()->with('Deleted Successfully');
    }
}
