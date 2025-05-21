<?php

namespace App\Http\Controllers\admin;

use App\Models\ServicePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServicePageController extends Controller
{
    public function index()
    {
        $servicepages = ServicePage::get();

        return view('admin.servicepages.index', compact('servicepages'));
    }

    public function create()
    {
        return view('admin.servicepages.create');
    }

    public function store(Request $request)
    {
        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
            ],
        ];

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('servicepages', 'custom');
        }

        $i = ServicePage::create($data);

        return $i
            ? redirect()->route('servicepage.index')->with('success', 'About page has been created successfully!')
            : redirect()->back()->with('error', 'Failed to create About page.')->withInput();
    }

    public function edit(string $id)
    {
        $servicepage = ServicePage::findOrFail($id);
        return view('admin.servicepages.edit', compact('servicepage'));
    }

    public function update(Request $request, string $id)
    {
        $servicepage = ServicePage::findOrFail($id);
        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
            ],
        ];

        if($request->hasFile('icon')){
            if($servicepage->icon && Storage::disk('custom')->exists($servicepage->icon)){
                Storage::disk('custom')->delete($servicepage->icon);
            }

            $data['icon'] = $request->file('icon')->store('servicepages', 'custom');
        }

        $i = $servicepage->update($data);

        return $i
            ? redirect()->route('servicepage.index')->with('success', 'Service Page has been updated')
            : redirect()->back()->with('succees', 'Failed to update Service Page');
    }
}
