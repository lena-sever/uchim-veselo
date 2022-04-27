<?php

namespace App\Http\Controllers\Test;

use App\Models\Course;

use App\Http\Controllers\Controller;
use App\Models\FirstTest;
use App\Models\SecondTest;
use App\Models\ThirdTest;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($course_id)
    {
        $course = Course::where('id','=',$course_id)->get();
        $first_tests = FirstTest::where('course_id','=',$course_id)->get();
        $second_tests = SecondTest::where('course_id','=',$course_id)->get();
        $third_tests = ThirdTest::where('course_id','=',$course_id)->get();

        return view('admin.test.index',[
            'course' => $course,
            'course_id' => $course_id,
            'first_tests' => $first_tests,
            'second_tests' => $second_tests,
            'third_tests' => $third_tests
        ]);
    }
}
