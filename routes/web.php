<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['middleware' => 'prevent-back-history'],['admin'])->group(function () {
    Route::get('/plates', function () {
        $plate = plate::latest()->paginate(20);
        return view('welcome', compact('plate')
    );
    })->name('plates');

    Route::get('/admin', [plateController::class, 'index']);
    Route::resource('/admin/home', PlateController::class);
});

Route::middleware( ['middleware' => 'prevent-back-history'],['user'])->group(function () {
Route::get('/user', [ClientController::class, 'index'])->name('user');
});
//profile settings routes
Route::get('/settings/{id}',  [ProfileController::class, 'settings'])->name('settings');
Route::put('/updatesettings/{id}',  [ProfileController::class, 'updatesettings'])->name('updateProfile');
Route::delete('/delete/{id}',  [ProfileController::class, 'destroysettings'])->name('deleteProfile');



Route::get('/', function () {
    $plate = plate::latest()->paginate(20);
    return view('Welcome', compact('plate')
);
})->name('landing');

Auth::routes();
