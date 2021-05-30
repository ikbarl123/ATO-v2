<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenulisController;
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

Auth::routes([ 
    'register' => false, 
    'reset' => false,
    'verify' => false, 
]);

Route::get('/', [App\Http\Controllers\WebView::class, 'index']);
Route::get('/buku', [App\Http\Controllers\WebView::class, 'buku']);
Route::get('admin', [App\Http\Controllers\AdminController::class, 'index']);

Route::resource('admin/buku', BukuController::class);
Route::resource('admin/penulis', PenulisController::class);
