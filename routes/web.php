<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController as CourseController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::get('/',[CourseController::class,'index'])
->name('course.index');
Route::get('/{course}',[CourseController::class, 'show'])
->where('course', '\d+')
->name('course.show');
