<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CrsReviewController extends Controller
{
    public function index()
    {
        $courseReviews = DB::table('course_reviews')
            ->join('users', 'users.id', '=', 'course_reviews.user_id')
            ->join('courses', 'courses.id', '=', 'course_reviews.course_id')
            ->orderByDesc('course_reviews.id')
            ->limit(10)
            ->select(
                'course_reviews.id',
                'course_reviews.text',
                'course_reviews.publish',
                'course_reviews.user_id',
                'users.name as user_name',
                'users.photo as user_photo',
                'course_reviews.course_id',
                'courses.title as course_title',
                'courses.img',
            )
            ->get();
        //  $courseReview = CourseReview::with('user', 'course')->get();

        return json_encode($courseReviews, JSON_UNESCAPED_UNICODE);
    }


    public function store(Request $request)
    {
        $courseReview = CourseReview::create($request->all());
        return response()->json($courseReview, 201);
    }

    public function show(CourseReview $courseReview)
    {

        $id = $courseReview->id;
        $courseReview = DB::table('course_reviews')
            ->join('users', 'users.id', '=', 'course_reviews.user_id')
            ->join('courses', 'courses.id', '=', 'course_reviews.course_id')
            ->where('course_reviews.id', $id)
            ->select(
                'course_reviews.id',
                'course_reviews.text',
                'course_reviews.publish',
                'course_reviews.user_id',
                'users.name as user_name',
                'users.photo as user_photo',
                'course_reviews.course_id',
                'courses.title as course_title',
                'courses.img',
            )
            ->first();
        // $courseReview->user_name = $courseReview->user->name;
        // $courseReview->course_title = $courseReview->course->title;

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
