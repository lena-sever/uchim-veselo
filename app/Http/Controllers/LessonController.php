<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();

        return view('lesson.index',[
            'lessons' => $lessons
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $first_tests = $lesson->first_tests()->get();
        $sliders = $lesson->sliders()->paginate(1);

        return view('lesson.show',[
            'lesson' => $lesson,
            'first_tests' => $first_tests,
            'sliders' => $sliders
        ]);
    }

}
