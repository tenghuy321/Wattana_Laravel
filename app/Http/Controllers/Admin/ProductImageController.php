<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function index()
    {
        $productImages = ProductImage::join('product_categories', 'product_images.product_category_id', 'product_categories.id')->where('product_images.active', 1)
            ->select('product_images.*', 'product_categories.name->en as cname')
            ->get();
        return view('admin.productImages.index', compact('productImages'));
    }
    public function create()
    {
        // Get all active categories that DON'T have product images yet
        $assignedCategoryIds = ProductImage::pluck('product_category_id')->toArray();

        $cats = ProductCategory::where('active', 1)
            ->whereNotIn('id', $assignedCategoryIds)
            ->get();

        return view('admin.productImages.create', compact('cats'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Exclude non-database fields
        $data = $request->except('_token', 'images');

        $category = ProductCategory::findOrFail($data['product_category_id']);
        // For folder name, use slug or sanitized name, here I assume 'name' is an array with 'en'
        $folderName = strtolower(str_replace(' ', '_', $category->name['en'] ?? 'category'));

        $imagePaths = [];

        foreach ($request->file('images') as $imageFile) {
            // Store images in folder named after category inside 'uploads/products'
            $path = $imageFile->store("products/{$folderName}", 'custom');
            $imagePaths[] = $path;
        }

        ProductImage::create([
            'product_category_id' => $data['product_category_id'],
            'image' => json_encode($imagePaths), // Save as JSON string
        ]);

        return redirect()->route('product_image.index')
            ->with('success', 'Images uploaded successfully!');
    }



    public function edit(string $id)
    {
        $cats = ProductCategory::where('active', 1)->get();
        $productImage = ProductImage::findOrFail($id);

        return view('admin.productImages.edit', compact('cats', 'productImage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_category_id' => 'nullable|exists:product_categories,id',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $productImage = ProductImage::findOrFail($id);

        $imagePaths = json_decode($productImage->image, true) ?? [];

        if ($request->filled('removed_images')) {
            $removedImages = json_decode($request->removed_images, true);

            foreach ($removedImages as $removedImage) {
                if (Storage::disk('custom')->exists($removedImage)) {
                    Storage::disk('custom')->delete($removedImage);
                }
                $imagePaths = array_filter($imagePaths, fn($img) => $img !== $removedImage);
            }
        }

        $product_category_id = $request->input('product_category_id', $productImage->product_category_id);

        $category = ProductCategory::findOrFail($product_category_id);
        $folderName = strtolower(str_replace(' ', '_', $category->name['en'] ?? 'category'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store("products/{$folderName}", 'custom');
                $imagePaths[] = $path;
            }
        }

        $productImage->product_category_id = $product_category_id;
        $productImage->image = json_encode(array_values($imagePaths));

        $productImage->save();

        return redirect()->route('product_image.index')
            ->with('success', 'Images updated successfully!');
    }


    public function delete($id)
    {
        $productImage = ProductImage::findOrFail($id);

        // Decode stored image paths
        $imagePaths = json_decode($productImage->image, true) ?? [];

        // Delete each image file from storage
        foreach ($imagePaths as $image) {
            if (Storage::disk('custom')->exists($image)) {
                Storage::disk('custom')->delete($image);
            }
        }

        // Delete the database record
        $productImage->delete();

        return redirect()->route('product_image.index')
            ->with('success', 'Product images and record deleted successfully!');
    }
}
