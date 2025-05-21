<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function index(){
        $visions = Vision::get();
        return view('admin.visions.index', compact('visions'));
    }

    // public function create(){
    //     return view('admin.visions.create');
    // }

    // public function store(Request $request){
    //     $validated = $request->validate([
    //         'content.en' => 'required|string',
    //         'content.kh' => 'required|string',
    //     ]);

    //     Vision::create([
    //         'content' => [
    //             'en' => $validated['content']['en'],
    //             'kh' => $validated['content']['kh'],
    //         ],
    //     ]);

    //     return redirect()->route('vision.index')
    //         ->with('success', 'Vision Content created successfully.');
    // }

    public function edit(string $id){
        $vision = Vision::findOrFail($id);

        return view('admin.visions.edit', compact('vision'));
    }

    public function update(Request $request, string $id){
        $vision = Vision::findOrFail($id);

        $validated = $request->validate([
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
        ]);

        $data = [
            'content' => [
                'en' => $validated['content']['en'] ?? '',
                'kh' => $validated['content']['kh'] ?? '',
            ],
        ];

        $i = $vision->update($data);

        return $i
            ? redirect()->route('vision.index')->with('success', 'Vision Content has been updated')
            : redirect()->back()->with('error', 'Failed to updated');
    }
}
