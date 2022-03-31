<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CrsController;
use App\Models\Course;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('courses', [CrsController::class,'index'])->name('api.course.index');
 
Route::get('courses/{course}', [CrsController::class,'show'])->name('api.course.show');
 
Route::post('courses', [CrsController::class,'store'])->name('api.course.store');

Route::put('courses/{course}', [CrsController::class,'update'])->name('api.course.update');
 
Route::delete('courses/{course}', [CrsController::class,'destroy'])->name('api.course.destroy');
