<?php

namespace App\Http\Controllers;

use App\Models\{Course, CourseReview, Lesson};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('course.index',[
            'courses' => $courses
        ]);
    }

    public function show(Course $course)
    {
        $lessons = $course->lessons()->get();
        $reviews = $course->courseReviews()
        ->with('user', 'course')
        ->get();

        return view('course.show',[
            'course' => $course,
            'lessons' => $lessons,
            'reviews' => $reviews
        ]);
    }

}
