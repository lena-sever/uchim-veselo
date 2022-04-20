<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\TestController as AdminTestController;
use App\Http\Controllers\Admin\CourseReviewController;
use App\Http\Controllers\Admin\MessengerController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

/*Route::get('/home', [HomeController::class, 'index'])->name('home');*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
        Route::view('/', 'admin.index')->name('index');

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

        Route::resource('/test', AdminTestController::class);
        Route::get('/test/destroy/{test}', [AdminTestController::class, 'destroy'])
            ->where('test', '\d+')
            ->name('test.destroy');
        Route::get('/test/answer/{test}', [AdminTestController::class, 'answer'])
            ->where('test', '\d+')
            ->name('test.answer');

        Route::resource('/messenger', MessengerController::class);
        Route::get('/messenger/destroy/{messenger}', [MessengerController::class, 'destroy'])
            ->where('messenger', '\d+')
            ->name('messenger.destroy');
    });
});


Route::get('/', [CourseController::class, 'index'])
    ->name('course.index');

Route::get('course/{course}', [CourseController::class, 'show'])
    ->where('course', '\d+')
    ->name('course.show');


/*Route::get('/lesson',[LessonController::class,'index'])
->name('lesson.index');*/

Route::get('lesson/{lesson}', [LessonController::class, 'show'])
    ->where('lesson', '\d+')
    ->name('lesson.show');
