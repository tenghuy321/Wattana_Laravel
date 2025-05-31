<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $product_categories = ProductCategory::where('active', 1)->get();

        return view('admin.product_categories.index', compact('product_categories'));
    }
    public function create()
    {
        return view('admin.product_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name.en' => 'required|string|max:255',
            'name.kh' => 'nullable|string|max:255',
            'icon' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name' => [
                'en' => $validated['name']['en'],
                'kh' => $validated['name']['kh'] ?? '',
            ],
            'slug' => $this->generateSlug($validated['name']['en']),
        ];

        // if ($request->hasFile('icon')) {
        //     $data['icon'] = $request->file('icon')->store('product_categories', 'custom');
        // }

        $i = ProductCategory::create($data);

        return $i
            ? redirect()->route('product_category.index')->with('success', 'Product Category has been saved successfully!')
            : redirect()->back()->with('error', 'Failed to save Product Category. Please try again.')->withInput();
    }



    public function edit(string $id)
    {
        $product_category = ProductCategory::findOrFail($id);
        return view('admin.product_categories.edit', compact('product_category'));
    }

    public function update(Request $request, string $id)
    {
        $product_category = ProductCategory::findOrFail($id);
        $validated = $request->validate([
            'name.en' => 'nullable|string|max:255',
            'name.kh' => 'nullable|string|max:255',
            'icon' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name' => [
                'en' => $validated['name']['en'],
                'kh' => $validated['name']['kh'] ?? '',
            ],
            'slug' => $this->generateSlug($validated['name']['en']),
        ];

        // if ($request->hasFile('icon')) {
        //     if ($product_category->icon && Storage::disk('custom')->exists($product_category->icon)) {
        //         Storage::disk('custom')->delete($product_category->icon);
        //     }
        //     $data['icon'] = $request->file('icon')->store('product_categories', 'custom');
        // }

        $i = $product_category->update($data);

        return $i
            ? redirect()->route('product_category.index')->with('success', 'Product Category has been updated!')
            : redirect()->back()->with('error', 'Failed to update Product Category');
    }

    private function generateSlug($name)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }


    public function delete(string $id)
    {
        $product_category = ProductCategory::findOrFail($id);
        // if ($product_category->icon && Storage::disk('custom')->exists($product_category->icon)) {
        //     Storage::disk('custom')->delete($product_category->icon);
        // }

        $i = $product_category->where('id', $id)->update(['active' => 0]);

        if ($i) {
            return redirect()->route('product_category.index');
        } else {
            return redirect()->back();
        }
    }
}
