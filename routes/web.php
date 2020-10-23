<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class, 'index']);
Route::get('/countries', [HomeController::class, 'countries']);
Route::post('/store',[HomeController::class, 'store']);
Route::get('/user_detail/{id}',[HomeController::class, 'show'])->name('show');
Route::get('details', function () {
	 $countries = Countries::all();
    // $data = \Location::get($ip);
    dd($countries);
   
});
