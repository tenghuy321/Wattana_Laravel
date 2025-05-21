<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $homepages = HomePage::get();
        return view('admin.homepages.index', compact('homepages'));
    }

    public function create()
    {
        return view('admin.homepages.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'sub_title.en' => 'nullable|string|max:255',
            'sub_title.kh' => 'nullable|string|max:255',
            'header.en' => 'nullable|string|max:255',
            'header.kh' => 'nullable|string|max:255',
            'body.en' => 'nullable|string',
            'body.kh' => 'nullable|string',
        ]);


        HomePage::create([
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
            'sub_title' => [
                'en' => $validated['sub_title']['en'] ?? '',
                'kh' => $validated['sub_title']['kh'] ?? '',
            ],
            'header' => [
                'en' => $validated['header']['en'] ?? '',
                'kh' => $validated['header']['kh'] ?? '',
            ],
            'body' => [
                'en' => $validated['body']['en'] ?? '',
                'kh' => $validated['body']['kh'] ?? '',
            ],
        ]);

        return redirect()->route('homepage.index')
            ->with('success', 'Homepage content created successfully.');
    }

    public function edit(string $id)
    {
        $homepage = HomePage::findOrFail($id);
        return view('admin.homepages.edit', compact('homepage'));
    }

    public function update(Request $request, string $id)
    {
        $homepage = HomePage::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'sub_title.en' => 'nullable|string|max:255',
            'sub_title.kh' => 'nullable|string|max:255',
            'header.en' => 'nullable|string|max:255',
            'header.kh' => 'nullable|string|max:255',
            'body.en' => 'nullable|string',
            'body.kh' => 'nullable|string',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
            'sub_title' => [
                'en' => $validated['sub_title']['en'] ?? '',
                'kh' => $validated['sub_title']['kh'] ?? '',
            ],
            'header' => [
                'en' => $validated['header']['en'] ?? '',
                'kh' => $validated['header']['kh'] ?? '',
            ],
            'body' => [
                'en' => $validated['body']['en'] ?? '',
                'kh' => $validated['body']['kh'] ?? '',
            ],
        ];

        $i = $homepage->update($data);

        return $i
            ? redirect()->route('homepage.index')->with('success', 'Homepage has been updated successfully!')
            : redirect()->back()->with('error', 'Failed to update Homepage.')->withInput();
    }
}
