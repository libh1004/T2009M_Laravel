<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\WebController;
use App\Http\Controllers\BookController;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add-to-cart/{id}',[WebController::class,"add_to_cart"]);
Route::get('/cart',[WebController::class,"cart"]);

// Demo
Route::get('/hello',[WebController::class,"hello"]);


// Book
Route::get("/books",[WebController::class,"list_book"]);
Route::get("/books/create-book",[WebController::class,"create_book"]);
Route::post("/books/save-book",[WebController::class,"save_book"]);

/*
 * composer dump -autoload
 */
