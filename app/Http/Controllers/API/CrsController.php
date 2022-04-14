<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;


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


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
