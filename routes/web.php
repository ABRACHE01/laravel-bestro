<?php

use App\Http\Controllers\PlateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Plate;


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

Route::get('/', function () {
    $plate = plate::latest()->paginate(20);
    return view('welcome', compact('plate'));
})->name('plates');;


Route::resource('/home', PlateController::class);



Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();