<?php

use App\Http\Livewire\Agriculteur;
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

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

//auth route for both :
Route::group(['middleware'=>['auth']], function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/dashboard/agriculteur', Agriculteur::class)->name('dashboard.agriculteur');
    Route::get('/dashboard/parcelle', 'App\Http\Controllers\DashboardController@parcelle')->name('dashboard.parcelle');
    Route::get('/dashboard/employe', 'App\Http\Controllers\DashboardController@employe')->name('dashboard.employe');
});


require __DIR__.'/auth.php';