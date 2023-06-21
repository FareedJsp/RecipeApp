<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\ChangePasswordController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function (){

    //DASHBOARD AUTH LOOP
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    //INGREDIENT TYPES
    Route::get('/ingredient-type',[IngredientTypeController::class,'index'])->name('ingredientType');
    Route::get('/create-ingredient-type',[IngredientTypeController::class,'create'])->name('ingredientType.create');
    Route::post('/add-ingredient-type',[IngredientTypeController::class,'store'])->name('ingredientType.store');
    Route::get('/edit-ingredient-type/{ingredientType}',[IngredientTypeController::class,'edit'])->name('ingredientType.edit')->middleware('can:edit-ingredient-types');
    Route::put('/update-ingredient-type/{ingredientType}',[IngredientTypeController::class,'update'])->name('ingredientType.update')->middleware('can:edit-ingredient-types');
    Route::get('/delete-ingredient-type/{ingredientType}',[IngredientTypeController::class,'destroy'])->name('ingredientType.delete');

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
});

//USERCONTROL
Route::get('/user',[UserController::class,'index'])->name('user');
Route::get('/create-user',[UserController::class,'create'])->name('user.create');
Route::post('/add-user',[UserController::class,'store'])->name('user.store');
Route::get('/show-user/{user}',[UserController::class,'show'])->name('user.show');
Route::get('/edit-user/{user}',[UserController::class,'edit'])->name('user.edit');
Route::put('/update-user/{user}',[UserController::class,'update'])->name('user.update');
Route::get('/delete-user/{user}',[UserController::class,'destroy'])->name('user.delete');
//ChangePassword
Route::post('/changepassword',[ChangePasswordController::class,'store'])->name('change.password');

//TEST ONLY
Route::view('/test', 'test')->middleware('auth');
