<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseReview;
use App\Http\Requests\Review\CreateRequest;
use App\Models\Course;
use App\Models\User;
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
        $reviews = CourseReview::all();
        $courses =Course::all();
        $users =User::all();

        return view('admin.review.index',[
            'reviews' => $reviews,
            'courses' => $courses,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $validated = $request->validated();
        $created = CourseReview::create($validated);

        if($created) {
            return redirect()->route('admin.course.show',['course' => $validated['course_id']])
                    ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function show(CourseReview $courseReview)
    {

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
    public function update( $request, CourseReview $courseReview)
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

    public function moderation(CourseReview $courseReview){
        try{
            if ($courseReview->publish == 0){
                $validated['publish'] = 1;
                $courseReview->fill($validated)->save();
                return back();

            }
        }catch(\Exception $e){
            Log::error('Ошибка публикации');
        }
    }
}
