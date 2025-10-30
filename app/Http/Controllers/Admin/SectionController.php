<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Exception;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function list()
    {
        $pageTitle = 'Sections';

        $sections = Section::get();

        return view('admin.sections.list', compact('pageTitle', 'sections'));
    }
    
    public function viewEdit($key)
    {
        $pageTitle = strtoupper($key);
        $sectionElements = Section::where('data_key', $key . "-element")->get();
        // $sectionContent = Section::where('data_key', $key . "-content")->first();

        return view('admin.sections.banner', compact('pageTitle', 'sectionElements'));
    }

    public function viewMultipleMission($key)
    {
        $pageTitle = strtoupper($key);
        $sectionElements = Section::where('data_key', $key . "-element")->get();
        $sectionContent = Section::where('data_key', $key . "-content")->first();

        return view('admin.sections.plan-edit', compact('pageTitle', 'sectionElements', 'sectionContent'));
    }

    public function storeSingle(Request $request, $key)
    {
        $section = Section::firstOrCreate(
            ['data_key' => $key . '-content'],
            ['data_value' => []]
        );
        $section->data_value = $request->except('_token');
        $section->save();
        return back();
    }

    public function store(Request $request, $key)
    {
        $data = $request->all();

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

        return back();
    }
}
