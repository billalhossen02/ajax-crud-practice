<?php
use App\Http\Controllers\HomeController;
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

Route::post('add/product',[HomeController::class, 'addProduct']);
Route::get('data/all',[HomeController::class, 'allData']);
Route::get('edit/data/{id}',[HomeController::class, 'editData']);
Route::post('update/data/{id}',[HomeController::class, 'updateData']);
Route::get('delete/data/{id}',[HomeController::class, 'deleteData']);

