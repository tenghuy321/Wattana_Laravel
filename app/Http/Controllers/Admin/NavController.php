<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NavController extends Controller
{
    public function index()
    {
        $nav = Nav::orderBy('order')->get();
        return view('admin.nav.index', compact('nav'));
    }

    public function create()
    {
        return view('admin.nav.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|image',
            'title.en' => 'nullable|string',
            'title.kh' => 'nullable|string',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ]
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('navImage', 'custom');
        }

        $data['order'] = Nav::max('order') + 1;


        $i = Nav::create($data);

        return $i
            ? redirect()->route('nav.index')->with('success', 'Navigation has been created')
            : redirect()->back()->with('error', 'Fail to created');
    }

    public function edit(string $id)
    {
        $navbar = Nav::findOrFail($id);
        return view('admin.nav.edit', compact('navbar'));
    }

    public function update(Request $request, string $id)
    {
        $navbar = Nav::findOrFail($id);
        $validated = $request->validate([
            'image' => 'nullable|image',
            'title.en' => 'nullable|string',
            'title.kh' => 'nullable|string'
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh']
            ]
        ];

        if ($request->hasFile('image')) {
            if ($navbar->image && Storage::disk('custom')->exists($navbar->image)) {
                Storage::disk('custom')->delete($navbar->image);
            }

            $data['image'] = $request->file('image')->store('navImage', 'custom');
        }

        $i = Nav::where('id', $id)->update($data);

        return $i
            ? redirect()->route('nav.index')->with('success', 'Navbar has been updated')
            : redirect()->back()->with('error', 'Fail to updated');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Nav::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
