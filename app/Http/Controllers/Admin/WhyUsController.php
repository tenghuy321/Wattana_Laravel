<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
        public function index()
    {
        $why_us = WhyUs::orderBy('order')->get();
        return view('admin.why_us.index', compact('why_us'));
    }

    public function create()
    {
        return view('admin.why_us.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'required|string',
            'title.kh' => 'required|string',
        ]);

        $nextOrder = WhyUs::max('order') + 1;

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
            'order' => $nextOrder,
        ];

        $i = WhyUs::create($data);

        return $i
            ? redirect()->route('why_us.index')->with('success', 'Why us Content created successfully.')
            : redirect()->back()->with('error', 'Failed to created');
    }

    public function edit(string $id)
    {
        $why = WhyUs::findOrFail($id);

        return view('admin.why_us.edit', compact('why'));
    }

    public function update(Request $request, string $id)
    {
        $why = WhyUs::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|string',
            'title.kh' => 'nullable|string',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'] ?? '',
                'kh' => $validated['title']['kh'] ?? '',
            ],
        ];

        $i = $why->update($data);

        return $i
            ? redirect()->route('why_us.index')->with('success', 'Why us Content has been updated')
            : redirect()->back()->with('error', 'Failed to updated');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            WhyUs::where('id', operator: $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id){

        $why = WhyUs::findOrFail($id);

        if ($why->delete()) {
            return redirect()->route('why_us.index')->with('success', 'Why us Content has been deleted');
        }

        return redirect()->back()->with('error', 'Failed to delete Why us Content');
    }
}
