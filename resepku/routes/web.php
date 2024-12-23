<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;


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

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/', [RecipeController::class, 'index'])->name('home');
    Route::get('/resep/{slug}', [RecipeController::class, 'detail'])->name('detail-recipe');

    Route::get('/tulis-resep', [RecipeController::class, 'create'])->name('add-recipe');
    Route::post('/tulis-resep', [RecipeController::class, 'store'])->name('add-recipe');

    Route::get('/resep/like/{id}', [LikeController::class, 'like'])->name('recipe.like');

    Route::post('logout', LogoutController::class)->name('logout');
    Route::get('recipes/{id}/prices', [RecipeController::class, 'showIngredientsPrices']);
});
Route::get('recipes/{id}/prices', [RecipeController::class, 'showIngredientsPrices']);
