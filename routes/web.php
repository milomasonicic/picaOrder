<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("all", [PizzaController::class, "index"])->name("allpizza");
Route::get("all/{id}", [PizzaController::class, "show"])->name("one");
Route::post("all", [CartController::class, "store"])->name("addPica");
Route::get("/karta", [CartController::class, "index"])->name("karta");

Route::post('/orders', [OrderController::class,'store'])->name('orders.store');
Route::get('/carts', [OrderController::class, 'show'])->name('carts.index');

require __DIR__.'/auth.php';
