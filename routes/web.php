<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\PainterController as AdminPainterController;
use App\Http\Controllers\Admin\FirstTestController;
use App\Http\Controllers\Admin\SecondTestController;
use App\Http\Controllers\Admin\ThirdTestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserCourseController;
use App\Http\Controllers\Test\IndexController as TestController;
use App\Http\Controllers\Admin\CourseReviewController;
use App\Http\Controllers\Admin\MessengerController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Account\IndexController as AccountController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])
->name('home');

Route::group(['middleware' => ['auth','is_admin']], function () {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
        Route::view('/', 'admin.index')->name('index');

        Route::resource('/user',UserController::class);
        Route::get('/user/destroy/{user}', [UserController::class, 'destroy'])
            ->where('user', '\d+')
            ->name('user.destroy');
        Route::get('/user/toggleAdmin/{user}', [UserController::class, 'toggleAdmin'])
            ->where('user', '\d+')
            ->name('user.toggleAdmin');

        Route::resource('/usercourse',UserCourseController::class);
        Route::get('/usercourse/index/{user}',[UserCourseController::class,'index'])
            ->where('user', '\d+')
            ->name('usercourse');
        Route::get('/usercourse/destroy/{userCourse}', [UserCourseController::class, 'destroy'])
            ->where('userCourse', '\d+')
            ->name('usercourse.destroy');

        Route::resource('/author', AdminAuthorController::class);
        Route::get('/author/destroy/{author}', [AdminAuthorController::class, 'destroy'])
            ->where('author', '\d+')
            ->name('author.destroy');

        Route::resource('/painter', AdminPainterController::class);
        Route::get('/painter/destroy/{painter}', [AdminPainterController::class, 'destroy'])
            ->where('painter', '\d+')
            ->name('painter.destroy');

        Route::resource('/course', AdminCourseController::class);
        Route::get('/course/destroy/{course}', [AdminCourseController::class, 'destroy'])
            ->where('course', '\d+')
            ->name('course.destroy');

        Route::resource('/lesson', AdminLessonController::class);
        Route::get('/lesson/destroy/{lesson}', [AdminLessonController::class, 'destroy'])
            ->where('lesson', '\d+')
            ->name('lesson.destroy');

        Route::resource('/courseReview', CourseReviewController::class);
        Route::get('/review/destroy/{courseReview}', [CourseReviewController::class, 'destroy'])
            ->where('courseReview', '\d+')
            ->name('review.destroy');
        Route::get('/courseReview/moderation/{courseReview}', [CourseReviewController::class, 'moderation'])
            ->where('courseReview', '\d+')
            ->name('courseReview.moderation');

        Route::get('/test/{course}', TestController::class)
        ->where('course', '\d+')
        ->name('test');

        Route::resource('/test_1', FirstTestController::class);
        Route::get('/test_1/destroy/{test_1}', [FirstTestController::class, 'destroy'])
        ->where('test_1', '\d+')
        ->name('test_1.destroy');
        Route::get('/test_1/answer/{test_1}', [FirstTestController::class, 'answer'])
            ->where('test_1', '\d+')
            ->name('test_1.answer');

        Route::resource('/test_2', SecondTestController::class);
        Route::get('/test_2/destroy/{test_2}', [SecondTestController::class, 'destroy'])
        ->where('test_2', '\d+')
        ->name('test_2.destroy');

        Route::resource('/test_3', ThirdTestController::class);
        Route::get('/test_3/destroy/{test_3}', [ThirdTestController::class, 'destroy'])
        ->where('test_3', '\d+')
        ->name('test_3.destroy');
        Route::get('/test_3/answer/{test_3}', [ThirdTestController::class, 'answer'])
            ->where('test_3', '\d+')
            ->name('test_3.answer');

        Route::resource('/slider', SliderController::class);
        Route::get('/slider/destroy/{slider}', [SliderController::class, 'destroy'])
        ->where('slider', '\d+')
        ->name('slider.destroy');

        Route::resource('/messenger', MessengerController::class);
        Route::get('/messenger/destroy/{messenger}', [MessengerController::class, 'destroy'])
            ->where('messenger', '\d+')
            ->name('messenger.destroy');

    });
});





