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
    public function index()
    {

    }

    public function create()
    {
        $courses = Course::all();
        $course_id = explode("course/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);

        return view('admin.lesson.create',[
            'courses' => $courses,
            'course_id' => $course_id
        ]);
    }

    public function store(CreateRequest $request)
    {
        $created = Lesson::create($request->validated());

		if($created) {
			return redirect()->route('admin.course.show',['course' => $request->course_id])
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    public function show(Lesson $lesson)
    {
        $sliders = $lesson->sliders()->get();
        return view('admin.lesson.show',[
            'lesson' => $lesson,
            'sliders' => $sliders,
        ]);
    }

    public function edit(Lesson $lesson)
    {
        $courses = Course::all();
        return view('admin.lesson.edit',[
            'lesson' => $lesson,
            'courses' => $courses
        ]);
    }

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
