<?php

namespace App\Http\Controllers;

use App\Models\{Course, CourseReview, Lesson};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return view('course.index',[
            'courses' => $courses
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $lessons = Lesson::all()
        ->where('course_id' , "=",$course->id);
        $reviews = CourseReview::all()
        ->where('course_id' , "=",$course->id);

        return view('course.show',[
            'course' => $course,
            'lessons' => $lessons,
            'reviews' => $reviews
        ]);
    }

}
