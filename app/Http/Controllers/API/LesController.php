<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
       return json_encode(Lesson::all(), JSON_UNESCAPED_UNICODE);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Lesson $lesson)
    {
        return  json_encode($lesson, JSON_UNESCAPED_UNICODE);
    }

    public function edit(Lesson $lesson)
    {
        //
    }

    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    public function destroy(Lesson $lesson)
    {
        //
    }
}
