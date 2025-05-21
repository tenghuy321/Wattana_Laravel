<?php

namespace App\Http\Controllers\Admin;

use App\Models\HeroBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HeroBannerController extends Controller
{
     public function index()
    {
        $heroes = HeroBanner::orderBy('order')->get();
        return view('admin.heroes.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.heroes.create'); // Your Blade form
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->except('_token', 'image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('heroes', 'custom');
        }

        $data['order'] = HeroBanner::max('order') + 1;

        $i = HeroBanner::create($data); // Use create instead of insert

        return $i
            ? redirect()->route('hero_banner.index')->with('success', 'Gallery iamge has been created successfully!')
            : redirect()->back()->with('error', 'Failed to create Gallery iamge.')->withInput();
    }

    public function edit(string $id)
    {
        $hero = HeroBanner::findOrFail($id);
        return view('admin.heroes.edit', compact('hero'));
    }

    public function update(Request $request, string $id)
    {
        $hero = HeroBanner::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->except('_token', '_method', 'image');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($hero->image && Storage::disk('custom')->exists($hero->image)) {
                Storage::disk('custom')->delete($hero->image);
            }

            // Store new one
            $data['image'] = $request->file('image')->store('heroes', 'custom');
        }

        $i = $hero->update($data);

        return $i
            ? redirect()->route('hero_banner.index')->with('success', 'Hero Banner has been updated successfully!')
            : redirect()->back()->with('error', 'Failed to update Hero Banner.')->withInput();
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            HeroBanner::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $hero = HeroBanner::findOrFail($id);
        if ($hero->image && Storage::disk('custom')->exists($hero->image)) {
            Storage::disk('custom')->delete($hero->image);
        }

        $deleted = $hero->delete();

        return $deleted
            ? redirect()->route('hero_banner.index')->with('success', 'Image deleted successfully!')
            : redirect()->back()->with('error', 'Failed to delete image.');
    }
}
