<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DetailsController;


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

Route::get('/', function () {  return view('index'); });

Route::get('home', function () {return view('index'); }); // returns the home page

Route::get('account', function () { if (!Auth::check()) {return redirect()->route('login');} return view('account'); }); // checks if user is logged in before showing account page

Route::get('order', function () { return view('order'); }); // returns order history

Route::get('basket', [BasketController::class, 'basketPage'])->name('basket');                          // displays the basket page
Route::post('basket/add/{product}', [BasketController::class, 'add'])->name('basket.add');              // adds a product to the basket
Route::delete('basket/remove/{product}', [BasketController::class, 'remove'])->name('basket.remove');   // removes a product from the basket
Route::post('basket/update', [BasketController::class, 'update'])->name('basket.update');               // updates quantities in the basket


Route::get('checkout', function () { if (!Auth::check()) {return redirect()->route('login');} return view('checkout'); }); // checks if a user is logged in and if so then shows checkout

Route::post('checkout', [BasketController::class, 'Orders'])->name('checkout.place'); // the post to the checkout form

Route::get('OrderPlaced', function () { return view('OrderPlaced'); })-> name('OrderPlaced');// shows the order confirmation page 

Route::get('product/{product}',[ProductController::class, 'show'])->name('product.show'); // shows individual products 

Route::get('products',[ProductController::class, 'productPage'])->name('products.productPage'); // shows all products regardless of category

//haidens - add authentication to this so only admin
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');

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

//People coding admin need to add authentication to this so only Admin team can carry out these functions, for now anyone can edit and delete products edits haidens as well

//Oms
Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');  
Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');



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




