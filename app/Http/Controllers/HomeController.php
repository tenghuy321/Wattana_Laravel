<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\WhyUs;
use App\Models\HomePage;
use App\Models\AboutPage;
use App\Models\Client;
use App\Models\ContactUs;
use App\Models\HeroBanner;
use App\Models\ProductPage;
use App\Models\ServicePage;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductUnique;
use App\Models\SubServicePage;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index(Request $request){
        $data['homes'] = HomePage::first();
        $data['heroBanner'] = HeroBanner::orderBy('order')->get();
        $data['aboutTitle'] = AboutPage::find(1);
        $data['aboutpage'] = AboutPage::where('id', '!=', 1)->get();

        $data['productTitle'] = ProductPage::first();
        $data['product_categories'] = ProductCategory::where('active', 1)->get();

        // Get the category filter (default to 'all' if no category is selected)
        $product_category = $request->query('product_category', 'all');

        $query = ProductImage::join('product_categories', 'product_images.product_category_id', '=', 'product_categories.id')
                        ->where('product_images.active', 1);

        // If a category is selected, filter by category
        if ($product_category !== 'all') {
            $query->where('product_categories.slug', $product_category);
        }

        $data['productImages'] = $query->select('product_images.*', 'product_categories.slug')->get();

        $data['service_title'] = ServicePage::find(1);
        $data['service_client'] = ServicePage::find(4);
        $data['service_product_unique'] = ServicePage::find(5);
        $data['sub_service'] = SubServicePage::get();

        $data['contact'] = ContactUs::first();
        $data['product_unique'] = ProductUnique::orderBy('order')->get();
        $data['clients'] = Client::orderBy('order')->get();

        $data['nav'] = Nav::first();
        // $data['id_home'] = Nav::where('order', 2)->first();
        // $data['id_about'] = Nav::where('order', 3)->first();
        // $data['id_products'] = Nav::where('order', 4)->first();
        // $data['id_services'] = Nav::where('order', 5)->first();
        // $data['id_why'] = Nav::where('order', 6)->first();
        // $data['id_client'] = Nav::where('order', 7)->first();
        // $data['id_contact'] = Nav::where('order', 8)->first();
        // $data['navItem'] = Nav::where('id', '!=', '1')->orderBy('order')->get();
        return view('home', $data);
    }
}
