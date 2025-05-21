<?php

namespace App\Http\Controllers\Admin;

use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::orderBy('order')->get();
        return view('admin.registration.index', compact('registrations'));
    }

    public function create()
    {
        return view('admin.registration.create'); // Your Blade form
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->except('_token', 'image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('registrations', 'custom');
        }

        $data['order'] = Registration::max('order') + 1;

        $i = Registration::create($data); // Use create instead of insert

        return $i
            ? redirect()->route('registration.index')->with('success', 'Registration has been created successfully!')
            : redirect()->back()->with('error', 'Failed to create Registration.')->withInput();
    }

    public function edit(string $id)
    {
        $registration = Registration::findOrFail($id);
        return view('admin.registration.edit', compact('registration'));
    }

    public function update(Request $request, string $id)
    {
        $registration = Registration::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->except('_token', '_method', 'image');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($registration->image && Storage::disk('custom')->exists($registration->image)) {
                Storage::disk('custom')->delete($registration->image);
            }

            // Store new one
            $data['image'] = $request->file('image')->store('registrations', 'custom');
        }

        $i = $registration->update($data);

        return $i
            ? redirect()->route('registration.index')->with('success', 'registration has been updated successfully!')
            : redirect()->back()->with('error', 'Failed to update registration.')->withInput();
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Registration::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $registration = Registration::findOrFail($id);
        if ($registration->image && Storage::disk('custom')->exists($registration->image)) {
            Storage::disk('custom')->delete($registration->image);
        }

        $deleted = $registration->delete();

        return $deleted
            ? redirect()->route('registration.index')->with('success', 'registration deleted successfully!')
            : redirect()->back()->with('error', 'Failed to delete registration.');
    }
}
