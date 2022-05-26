<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CrsController;
use App\Http\Controllers\API\CrsReviewController;
use App\Http\Controllers\API\UserController;


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

/*************  К О М И К С Ы ************/

// список всех историй
Route::get('courses', [CrsController::class,'index'])->name('api.course.index');
// список всех глав и отзывы (надо доделать/переделать)
Route::get('courses/{course}', [CrsController::class,'show'])->name('api.course.show');
// поиск по комиксам
Route::post('courses/search', [CrsController::class,'search'])->name('api.course.search');
// поиск по автору
Route::get('author/{author}', [CrsController::class,'author'])->name('api.author');
// поиск по художнику
Route::get('painter/{painter}', [CrsController::class,'painter'])->name('api.painter');



/*************  С Л А Й Д Е Р Ы ************/
// первый слайдер истории
Route::get('courses/first_slider/{course}', [CrsController::class,'show_first_slider']);
// второй слайдер истории
Route::get('courses/second_slider/{course}', [CrsController::class,'show_second_slider']);
// последний слайдер истории
Route::get('courses/last_slider/{course}', [CrsController::class,'show_last_slider']);


/*************  Т Е С Т Ы ************/
// первый тест
Route::get('courses/first_test/{course}', [CrsController::class,'first_test']);
// второй тест
Route::get('courses/second_test/{course}', [CrsController::class,'second_test']);



/*************  О Т З Ы В Ы  ************/
// отзывы на главной
Route::get('course_reviews', [CrsReviewController::class,'index']);
// отдельный отзыв к истории
Route::get('course_reviews/{course_review}', [CrsReviewController::class,'show']);
// добавление отдельного отзыва к истории
Route::post('course_reviews', [CrsReviewController::class,'store']);
// редактирование отдельного отзыва
Route::put('course_reviews/{course_review}', [CrsReviewController::class,'update']);
// удаление отдельного отзыва
Route::delete('course_reviews/{course_review}', [CrsReviewController::class,'destroy']);


/*************  Ю З Е Р Ы  ************/
//информация по одному пользователю
Route::get('user/{user}', [UserController::class,'show'])->name('api.user.show');
// test user
Route::get('user', [UserController::class,'test_form']);
// регистрация
Route::post('user', [UserController::class,'store']);
// авторизация
Route::post('user/login', [UserController::class,'login']);
// auth
Route::post('user/auth', [UserController::class,'auth']);
// сообщение с сайта
Route::post('messange', [UserController::class,'messange']);
//переключение лайков
Route::post('like', [UserController::class,'like']);
// подтвердить оплату курса
Route::post('payment', [UserController::class,'payment']);
