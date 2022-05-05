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
        $les_id = $les_id->id;

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
        $les_id = $les_id->id;

        $first_slider = DB::table('sliders')
            ->where('lesson_id', $les_id)
            ->get();

        return json_encode($first_slider, JSON_UNESCAPED_UNICODE);
    }

    public function first_test(Course $course)
    {
        $id = $course->id;

        $first_test = DB::table('first_tests')
            ->where('course_id', $id)
            ->get();

        return json_encode($first_test, JSON_UNESCAPED_UNICODE);
    }


    public function second_test(Course $course)
    {
        $id = $course->id;



        $result = DB::table('second_tests')
            ->where('course_id', $id)
            ->get();

            $res = [];
            $res['chooseWords'] = [];
            $i = 0;
        foreach($result[0] as $key=>$item) {
            if ($key=='course_id' || $key=='img' || $key=='etymology') $res[$key] = $item;;
            if (preg_match('#part_sentence#', $key)) {
                $res['chooseWords'][$i]['type'] = "text";
                $res['chooseWords'][$i]['content'] = $item;
                $i++;    
            }
            if (preg_match('#right_word#', $key)) {
                $res['chooseWords'][$i]['type'] = "button";
                $res['chooseWords'][$i]['correctText'] = $item;
            } 
            if (preg_match('#wrong_word#', $key)) {
                $res['chooseWords'][$i]['incorrectText'] = $item;
                $i++;    
            } 
        }

        // dd($result);
        return json_encode($res, JSON_UNESCAPED_UNICODE);
        dd($res);


        $third_tests = DB::table('third_tests')
        ->where('course_id', $id)
        ->select(['right_sentence', 'words'])
        ->get();
        $result['sentences'] = $third_tests;
        // dd($result);

        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
