<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;


class CrsController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return json_encode($courses, JSON_UNESCAPED_UNICODE);
    }



    public function store(Request $request)
    {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }


    public function show(Course $course)
    {
        $lessons = $course->lessons()->get();
        $reviews =  $course->courseReviews()
            ->with('user')
            ->get();
        $course->lessons =  $lessons;
        $course->reviews =  $reviews;

        $course = json_encode($course, JSON_UNESCAPED_UNICODE);

        return $course;
    }


    public function show_first_slider(Course $course)
    {
        $id = $course->id;
        //получим номер первого урока этого курса
        $les_id = DB::table('lessons')->where('course_id', $id)->orderBy('id')->first();
        $les_id = $les_id-> id;

        $first_slider = DB::table('sliders')
            ->where('lesson_id', $les_id)
            ->get();

        return json_encode($first_slider, JSON_UNESCAPED_UNICODE);

    }

    
    public function show_last_slider(Course $course)
    {
        $id = $course->id;
        //получим номер первого урока этого курса
        $les_id = DB::table('lessons')->where('course_id', $id)->orderBy('id', 'desc')->first();
        $les_id = $les_id-> id;

        $first_slider = DB::table('sliders')
            ->where('lesson_id', $les_id)
            ->get();

        return json_encode($first_slider, JSON_UNESCAPED_UNICODE);

    }
}
