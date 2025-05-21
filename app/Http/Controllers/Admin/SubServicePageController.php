<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SubServicePage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SubServicePageController extends Controller
{
    public function index()
    {
        $sub_servicepages = SubServicePage::get();

        return view('admin.sub_servicepages.index', compact('sub_servicepages'));
    }

    public function create()
    {
        return view('admin.sub_servicepages.create');
    }

    public function store(Request $request)
    {
        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
            ],
            'content' => [
                'en' => $request->input('content.en', ''),
                'kh' => $request->input('content.kh', ''),
            ]
        ];

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('sub_servicepages', 'custom');
        }

        $i = SubServicePage::create($data);

        return $i
            ? redirect()->route('sub_servicepage.index')->with('success', 'Service has been created successfully!')
            : redirect()->back()->with('error', 'Failed to create Service.')->withInput();
    }

    public function edit(string $id)
    {
        $sub_servicepage = SubServicePage::findOrFail($id);
        return view('admin.sub_servicepages.edit', compact('sub_servicepage'));
    }

    public function update(Request $request, string $id)
    {
        $sub_servicepage = SubServicePage::findOrFail($id);
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
            if($sub_servicepage->icon && Storage::disk('custom')->exists($sub_servicepage->icon)){
                Storage::disk('custom')->delete($sub_servicepage->icon);
            }

            $data['icon'] = $request->file('icon')->store('sub_servicepages', 'custom');
        }

        $i = $sub_servicepage->update($data);

        return $i
            ? redirect()->route('sub_servicepage.index')->with('success', 'Service has been updated')
            : redirect()->back()->with('succees', 'Failed to update Service');
    }

    public function delete(string $id)
    {
        $sub_servicepage = SubServicePage::findOrFail($id);
        if ($sub_servicepage->icon && Storage::disk('custom')->exists($sub_servicepage->icon)) {
            Storage::disk('custom')->delete($sub_servicepage->icon);
        }

        $deleted = $sub_servicepage->delete();

        return $deleted
            ? redirect()->route('sub_servicepage.index')->with('success', 'Servicess deleted successfully!')
            : redirect()->back()->with('error', 'Failed to delete Services.');
    }
}
