<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminWebLoginController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\PointsVoucherController;
use App\Http\Controllers\DailySpin;
use App\Http\Controllers\SlotMachine;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// @todo: For each route, add comments to explain what it does and how it works
  Route::get('/debug/categories', function () {
    return \App\Models\Category::select('id','name')->get();  //ignore this one (haiden) i made this as a way to fix an issue i had with products not showing up
  });

Route::get('/', function () {  return view('index'); });

Route::get('home', function () {return view('index'); }); // returns the home page

Route::get('ai', function () {return view('ai'); }); // returns ai chat bot

Route::post('send',[ChatBotController::class, 'sendChat']);

Route::middleware('auth')->get('/dailySpin', function () {return view('dailySpin');})->name('dailySpin');
Route::middleware('auth')->post('/dailySpin', [DailySpin::class, 'spin']);
Route::middleware('auth')->post('/awardPoints/{points}', [DailySpin::class, 'awardPoints']);

Route::middleware('auth')->get('/slots', function () {return view('slots');})->name('slots');
Route::middleware('auth')->post('/slots/spin', [SlotMachine::class, 'spin']);

Route::get('/stock', [ProductController::class, 'stockChecker'])->name('stockChecker');
Route::post('/stock/{product}/update', [ProductController::class, 'updateStock'])->name('updateStock');
Route::post('/stock/{product}/restock', [ProductController::class, 'restock'])->name('stockRestock');

Route::get('account', function () {
     if (!Auth::check()) {
        return redirect()->route('login');
        }
        
        // admin sees admin account page
        if(Auth::user()->role === 'admin'){
            return view('admin_account');
        }
        // useers sees normal account page
        return view('account'); 
        }); // checks if user is logged in before showing account page

Route::get('order', function () { return view('order'); }); // returns order history

Route::get('basket', [BasketController::class, 'basketPage'])->name('basket');                          // displays the basket page
Route::post('basket/add/{product}', [BasketController::class, 'add'])->name('basket.add');              // adds a product to the basket
Route::delete('basket/remove/{product}', [BasketController::class, 'remove'])->name('basket.remove');   // removes a product from the basket
Route::post('basket/update', [BasketController::class, 'update'])->name('basket.update');               // updates quantities in the basket

Route::get('/reward', function () {  return view('reward'); }); 

Route::get('checkout', function () { if (!Auth::check()) {return redirect()->route('login');} return view('checkout'); }); // checks if a user is logged in and if so then shows checkout

Route::post('checkout', [CheckoutController::class, 'Orders'])->name('checkout.place'); // the post to the checkout form

Route::get('checkout/address', function () { if (!Auth::check()) { return redirect()->route('login'); } return view('checkoutAddress'); })->name('checkout.address'); //checks to see if you're logged in alongside displaying the checkout form

Route::get('OrderPlaced', function () { return view('OrderPlaced'); })-> name('OrderPlaced');// shows the order confirmation page 

Route::get('product/{product}',[ProductController::class, 'show'])->name('product.show'); // shows individual products 
//oms
Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('products',[ProductController::class, 'productPage'])->name('products.productPage'); // shows all products regardless of category

//haidens - add authentication to this so only admin
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
//haidens 
Route::post('product/{product}/reviews', [\App\Http\Controllers\ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');

Route::middleware('auth')->group(function (){
    Route::get('/wishlist', [FavouriteController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{product}', [FavouriteController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{product}', [FavouriteController::class, 'destroy'])->name('wishlist.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/points/vouchers', [PointsVoucherController::class, 'index'])->name('points.vouchers');
    Route::post('/points/vouchers/redeem', [PointsVoucherController::class, 'redeem'])->name('points.vouchers.redeem');
});

Route::post('/voucher/apply', [BasketController::class, 'applyVoucher'])->name('voucher.apply');
Route::post('/voucher/remove', [BasketController::class, 'removeVoucher'])->name('voucher.remove');

Route::get('products/{cat}',[ProductController::class, 'cat'])->name('products.cat'); // shows products in their own category

Route::get('faq', function () { return view('faq'); }); // shows the FAQ page

Route::get('mydetails', [DetailsController::class, 'show'])->name('mydetails');     // shows the my details page

Route::get('/changeEmail', [DetailsController::class, 'show_changeEmail'])->name('change.email');               // shows the change email page
Route::post('/changeEmail', [DetailsController::class, 'update_email'])->name('update.email');                  // updates the email in the database

Route::get('/changePassword', [DetailsController::class, 'show_changePassword'])->name('change.password');    // shows the change password page
Route::post('/changePassword', [DetailsController::class, 'update_password'])->name('update.password');       // updates the password in the database

Route::get('aboutus', function () { return view('aboutus'); }); // shows the about us page

Route::get('contactform', function () { return view('contactform'); }); // shows the contact form

Route::get('register', [RegisterController::class, 'create'])->name('register'); //registers a name 
Route::post('register', [RegisterController::class, 'store'])->name('register.store'); //stores the name in the database

Route::get('login', [LoginController::class, 'create'])->name('login'); //allows a user to login 
Route::post('login', [LoginController::class, 'store'])->name('login.store'); //checks user data against database data

Route::post('logout', [LoginController::class, 'logout'])->name('logout'); //logsout user 
Route::post('contactform', [ContactFormController::class, 'submit'])->name('contactform.submit');


//admin login route
Route::get('admin/login', [AdminWebLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminWebLoginController::class, 'login'])->name('admin.login.submit');

//Suja
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('termsandprivacy', function () { return view('termsandprivacy'); }); //shows the terms and privacy page (EMPTY RN)


Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');
     Route::get('/admin/customers', [CustomerController::class, 'webIndex'])
    ->name('admin.customers');
     Route::get('/admin/orders', [OrderController::class, 'webIndex'])
    ->name('admin.orders');
     Route::get('/admin/products', [AdminProductController::class, 'webIndex'])
    ->name('admin.products');

    // new page for contact messages
    Route::view('/admin/messages', 'admin_msg')
    ->name('admin.messages');
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');
    // stock routes
    Route::post('admin/stock/{product}/update', [ProductController::class, 'updateStock'])->name('updateStock');
    Route::post('admin/stock/{product}/restock', [ProductController::class, 'restock'])->name('stockRestock');
    // order status update route
    Route::put('/admin/orders/{id}/status', [OrderController::class, 'webUpdateStatus'])->name('admin.orders.status');
    // contact form route
    Route::get('/admin/contactforms', [ContactController::class, 'index'])->name('admin.contactforms');
    Route::get('/admin/contactforms/{id}', [ContactController::class, 'show'])->name('admin.contactforms.show');
    Route::post('/admin/contactforms/{id}/reply', [ContactController::class, 'reply'])->name('admin.contactforms.reply');
    Route::delete('/admin/contactforms/{id}', [ContactController::class, 'destroy'])->name('admin.contactforms.destroy');
    // customer routes
    Route::get('/admin/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('/admin/customers', [CustomerController::class, 'store'])->name('admin.customers.store');
    Route::post('/admin/customers/{id}/toggle-status', [CustomerController::class, 'toggleStatus'])->name('admin.customers.toggle');
});

// Route::get('studentlisting', 'App\Http\Controllers\StudentController@list')->name('list_student');
// Route::get('studentprofile/{}', 'App\Http\Controllers\StudentController@show');
// Route::get('modulelisting', 'App\Http\Controllers\ModuleController@list')->name('list_module');
// Route::get('moduledetails/{id}', 'App\Http\Controllers\ModuleController@show');
// Route::get('checkout', function () { return view('checkout'); });


// Route::get('product', function () { $product = Product::first(); return view('product', compact('product')); });

// Route::get('products', function () { return view('products'); });



// Route::get('/', function () {
//     return view('home');
// });


// Route::get('home', function () {
//     return view('home');
// });
