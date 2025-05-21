<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\admin\CoreValueController;
use App\Http\Controllers\Admin\HeroBannerController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\admin\MissionController;
use App\Http\Controllers\admin\MsgController;
use App\Http\Controllers\Admin\NavController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductPageController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\admin\ServicePageController;
use App\Http\Controllers\Admin\SubServicePageController;
use App\Http\Controllers\admin\VisionController;
use App\Http\Controllers\Admin\WhyUsController;
use App\Http\Controllers\CustomizationController;
use App\Models\ProductCategory;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('about')->group(function () {
    Route::get('/', fn() => redirect()->route('abouts.vision'))->name('about');

    Route::get('/vision', [AboutController::class, 'vision'])->name('abouts.vision');
    Route::get('/mission', [AboutController::class, 'mission'])->name('abouts.mission');
    Route::get('/core-values', [AboutController::class, 'coreValues'])->name('abouts.core-values');
    Route::get('/msg', [AboutController::class, 'msg'])->name('abouts.msg');
});
Route::get('/our_products', [ProductsController::class, 'index'])->name('our_products');

Route::prefix('service')->group(function () {
    Route::get('/', fn() => redirect()->route('services.our-service'))->name('service');

    Route::get('/our-service', [ServiceController::class, 'ourService'])->name('services.our-service');
    Route::get('/why-us', [ServiceController::class, 'whyUs'])->name('services.why-us');
    Route::get('/registration', [ServiceController::class, 'registration'])->name('services.registration');
});

Route::get('/customization', [CustomizationController::class, 'index'])->name('customization');
Route::get('/customization/{slug}', [CustomizationController::class, 'show'])->name('customization.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {

    // homepage
    Route::resource('homepage', HomePageController::class)->except(['destroy', 'show']);

    // hero banner
    Route::resource('hero_banner', HeroBannerController::class)->except(['destroy', 'show']);
    Route::post('/hero_banner/reorder', [HeroBannerController::class, 'reorder'])->name('hero_banner.reorder');
    Route::get('hero_banner/delete/{id}', [HeroBannerController::class, 'delete'])->name('hero_banner.delete');

    // about us
    Route::resource('aboutpage', AboutPageController::class)->except(['destroy', 'show']);

    // vision
    Route::resource('vision', VisionController::class)->except(['destroy', 'show']);

    // mission
    Route::resource('mission', MissionController::class)->except(['destroy', 'show']);

    // core value
    Route::resource('core_value', CoreValueController::class)->except(['destroy', 'show']);
    Route::post('/core_value/reorder', [CoreValueController::class, 'reorder'])->name('core_value.reorder');
    Route::get('core_value/delete/{id}', [CoreValueController::class, 'delete'])->name('core_value.delete');

    // msg
    Route::resource('msg', MsgController::class)->except(['destroy', 'show']);

    // services
    Route::resource('servicepage', ServicePageController::class)->except(['destroy', 'show']);

    // service
    Route::resource('sub_servicepage', SubServicePageController::class)->except(['destroy', 'show']);
    Route::get('sub_servicepage/delete/{id}', [SubServicePageController::class, 'delete'])->name('sub_servicepage.delete');

    // why us
    Route::resource('why_us', WhyUsController::class)->except(['destroy', 'show']);
    Route::post('/why_us/reorder', [WhyUsController::class, 'reorder'])->name('why_us.reorder');
    Route::get('why_us/delete/{id}', [WhyUsController::class, 'delete'])->name('why_us.delete');

    // registration
    Route::resource('registration', RegistrationController::class)->except(['destroy', 'show']);
    Route::post('/registration/reorder', [RegistrationController::class, 'reorder'])->name('registration.reorder');
    Route::get('registration/delete/{id}', [RegistrationController::class, 'delete'])->name('registration.delete');

    Route::resource('contactUs', ContactUsController::class)->except(['destroy', 'show']);

    // product page
    Route::resource('productpage', ProductPageController::class)->except(['destroy', 'show']);

    // product categories
    Route::resource('product_category', ProductCategoryController::class)->except(['destroy', 'show']);
    Route::get('product_category/delete/{id}', [ProductCategoryController::class, 'delete'])->name('product_category.delete');

    // Products
    Route::resource('product_image', ProductImageController::class)->except(['destroy', 'show']);
    Route::get('product_image/delete/{id}', [ProductImageController::class , 'delete'])->name('product_image.delete');

    // nav
    Route::resource('nav', NavController::class)->except(['destroy', 'show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
