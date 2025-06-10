<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutList;
use Illuminate\Http\Request;

class AboutListController extends Controller
{
    public function index()
    {
        $aboutlists = AboutList::get();

        return view('admin.aboutlists.index', compact('aboutlists'));
    }

    public function create()
    {
        return view('admin.aboutlists.create');
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

        $i = AboutList::create($data);

        return $i
            ? redirect()->route('aboutlist.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to created.')->withInput();
    }

    public function edit(string $id)
    {
        $aboutlist = AboutList::findOrFail($id);
        return view('admin.aboutlists.edit', compact('aboutlist'));
    }

    public function update(Request $request, string $id)
    {
        $aboutlist = AboutList::findOrFail($id);
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

        $i = $aboutlist->update($data);

        return $i
            ? redirect()->route('aboutlist.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('succees', 'Failed to updated');
    }
}
