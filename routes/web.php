<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController as Backend;

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

Route::get('/teacher',[Backend::class,'index'])->name('teacher.view');
Route::post('/teacher/create',[Backend::class,'store'])->name('teacher.post');
Route::get('/teacher/create/{id}',[Backend::class,'show'])->name('teacher.edit');
Route::get('/teacher/show/{id}',[Backend::class,'destroy'])->name('teacher.delete');
Route::PUT('/teacher/update/{id}',[Backend::class,'update'])->name('teacher.update');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
