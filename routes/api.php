<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CrsController;
use App\Http\Controllers\API\CrsReviewController;
use App\Http\Controllers\API\TestController;

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

// список всех курсов
Route::get('courses', [CrsController::class,'index'])->name('api.course.index');
// список всех глав и отзывы (надо доделать/переделать)
Route::get('courses/{course}', [CrsController::class,'show'])->name('api.course.show');
// первый слайдер истории
Route::get('courses/first_slider/{course}', [CrsController::class,'show_first_slider']);



Route::get('course_reviews', [CrsReviewController::class,'index']);
Route::get('course_reviews/{course_review}', [CrsReviewController::class,'show']);
Route::post('course_reviews', [CrsReviewController::class,'store']);
Route::put('course_reviews/{course_review}', [CrsReviewController::class,'update']);
Route::delete('course_reviews/{course_review}', [CrsReviewController::class,'destroy']);

//слайдеры 
// Route::get('lesson/{lesson}', [TestController::class,'show_first_test']);
