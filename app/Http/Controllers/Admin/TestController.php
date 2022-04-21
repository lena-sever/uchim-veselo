<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;

use App\Http\Controllers\Controller;
use App\Models\FirstTest;
use App\Models\SecondTest;
use App\Models\ThirdTest;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($course_id)
    {
        $course = Course::all();
        $first_tests = FirstTest::all();
        $second_tests = SecondTest::all();
        $third_tests = ThirdTest::all();

        return view('admin.test.index',[
            'course' => $course,
            'course_id' => $course_id,
            'first_tests' => $first_tests,
            'second_tests' => $second_tests,
            'third_tests' => $third_tests
        ]);
    }
}
