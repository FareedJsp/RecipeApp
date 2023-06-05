<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//INGREDIENT

Route::get('/ingredient',[IngredientController::class,'index'])->name('ingredient');
Route::get('/create-ingredient',[IngredientController::class,'create'])->name('ingredient.create');
Route::post('/add-ingredient',[IngredientController::class,'store'])->name('ingredient.store');
Route::get('/edit-ingredient/{ingredient}',[IngredientController::class,'edit'])->name('ingredient.edit');
Route::put('/update-ingredient/{ingredient}',[IngredientController::class,'update'])->name('ingredient.update');
Route::get('/delete-ingredient/{ingredient}',[IngredientController::class,'destroy'])->name('ingredient.delete');

//TEST ONLY
Route::get('/test', function () {
    return view('test');
});
