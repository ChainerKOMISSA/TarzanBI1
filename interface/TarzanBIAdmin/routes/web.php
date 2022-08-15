<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use ArielMejiaDev\LarapexCharts\LarapexChart;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/predict', [App\Http\Controllers\PredictController::class, 'predict']) ->name('prediction');

Route::get('/predictprod', [App\Http\Controllers\PredictProdController::class, 'predictprod']) ->name('produits');

Route::get('/utilisateurs', [App\Http\Controllers\UserController::class, 'habits']) ->name('utilisateurs');

Route::post('/resultats', [App\Http\Controllers\ResultController::class, 'result']) -> name('resultats');
  
Route::resource('user', UserController::class);

Route::get('/stats/mois', [App\Http\Controllers\MonthController::class, 'month']) ->name('stats/mois');

Route::post('/statistics', [App\Http\Controllers\StatController::class, 'stats']) ->name('statistiques');

