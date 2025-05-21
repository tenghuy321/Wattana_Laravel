<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    public function index()
    {
        $core_values = CoreValue::orderBy('order')->get();
        return view('admin.core_values.index', compact('core_values'));
    }

    public function create()
    {
        return view('admin.core_values.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'required|max:255',
            'title.kh' => 'required|max:255',
            'content.en' => 'required|string',
            'content.kh' => 'required|string',
        ]);

        $nextOrder = CoreValue::max('order') + 1;

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
            'content' => [
                'en' => $validated['content']['en'],
                'kh' => $validated['content']['kh'],
            ],
            'order' => $nextOrder,
        ];

        $i = CoreValue::create($data);

        return $i
            ? redirect()->route('core_value.index')->with('success', 'Core Value Content created successfully.')
            : redirect()->back()->with('error', 'Failed to created');
    }

    public function edit(string $id)
    {
        $core_value = CoreValue::findOrFail($id);

        return view('admin.core_values.edit', compact('core_value'));
    }

    public function update(Request $request, string $id)
    {
        $core_value = CoreValue::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|max:255',
            'title.kh' => 'nullable|max:255',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'] ?? '',
                'kh' => $validated['title']['kh'] ?? '',
            ],
            'content' => [
                'en' => $validated['content']['en'] ?? '',
                'kh' => $validated['content']['kh'] ?? '',
            ],
        ];

        $i = $core_value->update($data);

        return $i
            ? redirect()->route('core_value.index')->with('success', 'Core Value has been updated')
            : redirect()->back()->with('error', 'Failed to updated');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            CoreValue::where('id', operator: $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id){

        $core_value = CoreValue::findOrFail($id);

        if ($core_value->delete()) {
            return redirect()->route('core_value.index')->with('success', 'Core Value has been deleted');
        }

        return redirect()->back()->with('error', 'Failed to delete Core Value');
    }
}
