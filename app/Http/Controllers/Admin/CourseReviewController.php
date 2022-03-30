<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function show(CourseReview $courseReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseReview $courseReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseReview $courseReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseReview $courseReview)
    {
        try{
            $courseReview->delete();
            return redirect()->route('admin.course.show',['course' => $courseReview->course_id]);
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
    }
}
