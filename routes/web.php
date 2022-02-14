<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SaveProduct;
use App\Http\Livewire\ProductTable;
use App\Http\Livewire\CategoryTable;
use App\Http\Livewire\Home;
use App\Http\Livewire\Orders;
use App\Http\Livewire\SingleProduct;
use App\Http\Livewire\ViewOrders;
use App\Http\Livewire\ViewProduct;
use App\Http\Livewire\MyProducts;
use App\Http\Livewire\ProductLists;
use App\Http\Livewire\SaveCategory;
use App\Http\Livewire\ViewSingleProduct;
use App\Http\Livewire\Balances;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\SaveDeliveryRegion;
use App\Http\Livewire\ViewDeliveryRegions;
use App\Http\Livewire\ViewDeliveryCities;
use App\Http\Livewire\SaveDeliveryArea;
use App\Http\Livewire\SaveFeatures;
use App\Http\Livewire\ViewCategory;
use App\Http\Livewire\ViewFeatures;
use App\Http\Controllers\OrderImportController;
use App\Http\Controllers\ProductImportController;
use App\Http\Controllers\BankImportController;
use App\Http\Controllers\CityImportController;
use App\Http\Controllers\OrderTemplateExportController;
use App\Http\Controllers\OrderBulkExportController;
use App\Http\Livewire\SaveRequestFacebookAd;
use App\Http\Livewire\OrderDetails;
use App\Http\Livewire\CodRequestTable;
use App\Http\Livewire\RequestFacebookAdTable;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',function(){
    return redirect()->to('login');
});

Route::get('product/{id}',SingleProduct::class)->name('view-single-product');
Route::get('view-product',ViewProduct::class)->name('view-product');
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('dashboard',Dashboard::class)->name('dashboard');

    Route::get('/save-product/{id?}',SaveProduct::class)->name('save-product')->middleware('roles:superadmin,vendor');
    Route::get('/save-feature/{id?}',SaveFeatures::class)->name('save-feature')->middleware('roles:superadmin');
    Route::get('/products',ProductLists::class)->name('products')->middleware('roles:superadmin,seller');
    Route::get('/view-product/{id}',ViewSingleProduct::class);

    Route::get('view-products',ProductTable::class)->name('view-products');
    Route::get('view-features',ViewFeatures::class)->name('view-features');
    Route::get('view-categories',CategoryTable::class)->name('view-categories')->middleware('roles:superadmin,vendor');
    Route::get('category/{slug}',ViewCategory::class)->name('category');


    Route::get('/save-order',Orders::class)->name('save-order')->middleware('roles:superadmin,seller');
    Route::get('/view-order',ViewOrders::class)->name('view-order')->middleware('roles:superadmin,seller');
    Route::get('/view-order-details/{id}',OrderDetails::class)->name('view-order-details')->middleware('roles:superadmin,seller');
    Route::get('my-products',MyProducts::class)->name('my-products')->middleware('roles:superadmin,seller');
    Route::get('/save-category/{id?}',SaveCategory::class)->name('save-category');
    Route::get('/balance',Balances::class)->name('balance')->middleware('roles:superadmin,seller');

    //delivery region
    Route::get('save-delivery-region/{id?}',SaveDeliveryRegion::class)->name('save-delivery-region')->middleware('roles:superadmin');
    Route::get('delivery-regions',ViewDeliveryRegions::class)->name('delivery-regions')->middleware('roles:superadmin');
    Route::get('delivery-cities',ViewDeliveryCities::class)->name('delivery-cities')->middleware('roles:superadmin');
    Route::get('save-delivery-area/{id}',SaveDeliveryArea::class)->name('save-delivery-area')->middleware('roles:superadmin');

    Route::get('cod-requests',CodRequestTable::class)->middleware('roles:superadmin')->name('cod-requests');

    Route::get('view-request-fb-table',RequestFacebookAdTable::class)->middleware('roles:superadmin')->name('view-request-fb-table');
    Route::get('save-request-facebook-ad',SaveRequestFacebookAd::class)->name('save-request-facebook-ad')->middleware('roles:superadmin,seller');

    // import bulk order

    // Route::get('bulk-order',[OrderImportController::class,'index']);
    // Route::post('save-bulk-order',[OrderImportController::class,'import']);

    //export order bulk template

    // Route::get('download-order-template',[OrderTemplateExportController::class,'export']);
    

    //export order bulk

    // Route::get('download-order-bulk',[OrderBulkExportController::class,'export']);

    // import product 

    // Route::get('bulk-product',[ProductImportController::class,'index']);
    // Route::post('save-bulk-product',[ProductImportController::class,'import']);

    // import cities

    // Route::get('bulk-cities',[CityImportController::class,'index']);
    // Route::post('save-bulk-cities',[CityImportController::class,'import']);

    // import banks

    // Route::get('bulk-banks',[BankImportController::class,'index']);
    // Route::post('save-bulk-banks',[BankImportController::class,'import']);

});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    echo '<h1>All Clear</h1>';
});

