<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseReview;
use Illuminate\Http\Request;


class CrsReviewController extends Controller
{
    public function index()
    {
        return json_encode(CourseReview::all(), JSON_UNESCAPED_UNICODE);
    }


    public function store(Request $request)
    {
        $courseReview = CourseReview::create($request->all());
        return response()->json($courseReview, 201);
    }

    public function show(CourseReview $courseReview)
    {
        return json_encode($courseReview, JSON_UNESCAPED_UNICODE);
    }


    public function update(Request $request, CourseReview $courseReview)
    {
        //
    }


    public function destroy(CourseReview $courseReview)
    {
        //
    }
}
