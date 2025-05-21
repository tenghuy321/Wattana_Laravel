<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
     public function index(){
        $missions = Mission::get();
        return view('admin.missions.index', compact('missions'));
    }

    // public function create(){
    //     return view('admin.missions.create');
    // }

    // public function store(Request $request){
    //     $validated = $request->validate([
    //         'content.en' => 'required|string',
    //         'content.kh' => 'required|string',
    //     ]);

    //     Mission::create([
    //         'content' => [
    //             'en' => $validated['content']['en'],
    //             'kh' => $validated['content']['kh'],
    //         ],
    //     ]);

    //     return redirect()->route('mission.index')
    //         ->with('success', 'Mission Content created successfully.');
    // }

    public function edit(string $id){
        $mission = Mission::findOrFail($id);

        return view('admin.missions.edit', compact('mission'));
    }

    public function update(Request $request, string $id){
        $mission = Mission::findOrFail($id);

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

        $i = $mission->update($data);

        return $i
            ? redirect()->route('mission.index')->with('success', 'Mission Content has been updated')
            : redirect()->back()->with('error', 'Failed to updated');
    }
}
