<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Http\Requests\Lesson\EditRequest;
use App\Http\Requests\Lesson\CreateRequest;
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $course_id = $_SERVER['HTTP_REFERER'];
        $course_id = explode("course/", $course_id);
        $course_id = end($course_id);

        return view('admin.lesson.create',[
            'courses' => $courses,
            'course_id' => $course_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {

        $created = Lesson::create($request->validated());

		if($created) {
			return redirect()->route('admin.lesson.index')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $tests = $lesson->tests()
        ->with('test_step','test_type')->get();

        return view('admin.lesson.show',[
            'tests' => $tests,
            'lesson' => $lesson
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $courses = Course::all();
        return view('admin.lesson.edit',[
            'lesson' => $lesson,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Lesson $lesson)
    {
        $validated = $request->validated();
        $updated = $lesson->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.course.show',['course' => $lesson->course_id])
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        try{
            $lesson->delete();
            return redirect()->route('admin.course.show',['course' => $lesson->course_id])
            ->with('success', 'Запись успешно удалена');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
    }
}
