<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Middleware\Auth;

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

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('/', [App\Http\Controllers\ProductController::class,'index'] )->name('product-list');

Route::get('/Admin00221', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth','admin']], function () {
Route::delete('/admindelete/{id}', [App\Http\Controllers\AdminController::class,'destroy'] )->name('admin.destroy');
Route::get('/admincreate', [App\Http\Controllers\AdminController::class,'create'] )->name('admin.create');
Route::get('/adminedit/{id}', [App\Http\Controllers\AdminController::class,'edit'] )->name('admin.edit');
Route::get('/adminshow/{id}', [App\Http\Controllers\AdminController::class,'show'])->name('admin.show');

Route::get('admin', [App\Http\Controllers\AdminController::class ,'index'])->name('admin.index');
Route::post('adminstore', [App\Http\Controllers\AdminController::class,'store'] )->name('admin.store');
Route::put('adminupdate', [App\Http\Controllers\AdminController::class,'update'] )->name('admin.update');

Route::get('/cmdliste',[App\Http\Controllers\CommandeController::class , 'index'])->name('cmd.index');
Route::get('/cmd/{id}',[App\Http\Controllers\CommandeController::class , 'show'])->name('cmd.show');
Route::post('/cmd/{id}',[App\Http\Controllers\CommandeController::class , 'update'])->name('cmd.update');
Route::delete('/cmd/{id}',[App\Http\Controllers\CommandeController::class , 'destroy'])->name('cmd.destroy');
});

Route::post('/addcmd',[App\Http\Controllers\CommandeController::class , 'store'])->name('cmd.store');
Route::resource('products', App\Http\Controllers\ProductController::class );

Route::resource('vente', App\Http\Controllers\VenteController::class );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// ROUTE CLIENT----------------------------------------------------------------
// Route::resource('clients', App\Http\Controllers\ClientController::class );

// Route::get('/clientslogin',[App\Http\Controllers\ClientController::class , 'index'])->name('clientslogin');

// Route::post('/loginclients',[App\Http\Controllers\ClientController::class , 'loginclients'])->name('loginclients');

Route::get('login-client', [App\Http\Controllers\AuthController::class, 'index'])->name('login-client');

Route::post('post-login', [App\Http\Controllers\AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('register-client', [App\Http\Controllers\AuthController::class, 'registration'])->name('register-client');

Route::post('post-registration', [App\Http\Controllers\AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// ROUTE CLIENT----------------------------------------------------------------



//Route::get('/clientslogin',[App\Http\Controllers\ClientController::class , 'login'])->name('clientslogin');




//panier client
Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');