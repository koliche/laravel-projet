<?php

use App\Http\Livewire\Agriculteur;
use App\Http\Livewire\Employe;
use App\Http\Livewire\Intervention;
use App\Http\Livewire\Tarif;
use App\Models\Employes;
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
    Route::get('/dashboard/employe', Employe::class)->name('dashboard.employe');
    Route::get('/dashboard/tarif', Tarif::class)->name('dashboard.tarif');
    Route::get('/dashboard/intervention', Intervention::class)->name('dashboard.intervention');
});


require __DIR__.'/auth.php';
