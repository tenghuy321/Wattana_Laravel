<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class AboutPageController extends Controller
{
    public function index()
    {
        $aboutpages = AboutPage::get();

        return view('admin.aboutpages.index', compact('aboutpages'));
    }

    // public function create()
    // {
    //     return view('admin.aboutpages.create');
    // }

    // public function store(Request $request)
    // {
    //     $data = [
    //         'title' => [
    //             'en' => $request->input('title.en', ''),
    //             'kh' => $request->input('title.kh', ''),
    //         ],
    //         'content' => [
    //             'en' => $request->input('content.en', ''),
    //             'kh' => $request->input('content.kh', ''),
    //         ]
    //     ];

    //     if ($request->hasFile('icon')) {
    //         $data['icon'] = $request->file('icon')->store('aboutpages', 'custom');
    //     }

    //     $i = AboutPage::create($data);

    //     return $i
    //         ? redirect()->route('aboutpage.index')->with('success', 'About page has been created successfully!')
    //         : redirect()->back()->with('error', 'Failed to create About page.')->withInput();
    // }

    public function edit(string $id)
    {
        $aboutpage = AboutPage::findOrFail($id);
        return view('admin.aboutpages.edit', compact('aboutpage'));
    }

    public function update(Request $request, string $id)
    {
        $aboutpage = AboutPage::findOrFail($id);
        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
            ],
            'content' => [
                'en' => $request->input('content.en'),
                'kh' => $request->input('content.kh'),
            ],
        ];

        if($request->hasFile('icon')){
            if($aboutpage->icon && Storage::disk('custom')->exists($aboutpage->icon)){
                Storage::disk('custom')->delete($aboutpage->icon);
            }

            $data['icon'] = $request->file('icon')->store('aboutpages', 'custom');
        }

        $i = $aboutpage->update($data);

        return $i
            ? redirect()->route('aboutpage.index')->with('success', 'About page has been updated')
            : redirect()->back()->with('succees', 'Failed to update About page');
    }

    public function destroy(string $id)
    {
        //
    }
}
