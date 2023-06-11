<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\IngredientTypeController;

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

Route::view('/dashboard', 'dashboard')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//INGREDIENT TYPES

Route::middleware('auth')->group(function (){
    Route::get('/ingredient-type',[IngredientTypeController::class,'index'])->name('ingredientType');
    Route::get('/create-ingredient-type',[IngredientTypeController::class,'create'])->name('ingredientType.create');
    Route::post('/add-ingredient-type',[IngredientTypeController::class,'store'])->name('ingredientType.store');
    Route::get('/edit-ingredient-type/{ingredientType}',[IngredientTypeController::class,'edit'])->name('ingredientType.edit');
    Route::put('/update-ingredient-type/{ingredientType}',[IngredientTypeController::class,'update'])->name('ingredientType.update');
    Route::get('/delete-ingredient-type/{ingredientType}',[IngredientTypeController::class,'destroy'])->name('ingredientType.delete');
});

//INGREDIENT

Route::get('/ingredient',[IngredientController::class,'index'])->name('ingredient');
Route::get('/create-ingredient',[IngredientController::class,'create'])->name('ingredient.create');
Route::post('/add-ingredient',[IngredientController::class,'store'])->name('ingredient.store');
Route::get('/edit-ingredient/{ingredient}',[IngredientController::class,'edit'])->name('ingredient.edit');
Route::put('/update-ingredient/{ingredient}',[IngredientController::class,'update'])->name('ingredient.update');
Route::get('/delete-ingredient/{ingredient}',[IngredientController::class,'destroy'])->name('ingredient.delete');

//MEASUREMENT

Route::get('/measurement',[MeasurementController::class,'index'])->name('measurement');
Route::get('/create-measurement',[MeasurementController::class,'create'])->name('measurement.create');
Route::post('/add-measurement',[MeasurementController::class,'store'])->name('measurement.store');
Route::get('/edit-measurement/{measurement}',[MeasurementController::class,'edit'])->name('measurement.edit');
Route::put('/update-measurement/{measurement}',[MeasurementController::class,'update'])->name('measurement.update');
Route::get('/delete-measurement/{measurement}',[MeasurementController::class,'destroy'])->name('measurement.delete');

//TEST ONLY
Route::view('/test', 'test')->middleware('auth');
