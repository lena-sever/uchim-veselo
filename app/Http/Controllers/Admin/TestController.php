<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Http\Requests\Test\EditRequest;
use App\Http\Requests\Test\CreateRequest;
use App\Models\Lesson;
use App\Models\TestStep;
use App\Models\TestType;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
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
        $lessons = Lesson::all();
        $test_steps = TestStep::all();
        $test_type = TestType::all();

        $lesson_id = explode("/", $_SERVER['HTTP_REFERER']);
        $lesson_id = end($lesson_id);
//dd($test_steps,$test_type);
        return view('admin.test.create',[
            'courses'=>$courses,
            'lessons'=>$lessons,
            'test_steps'=> $test_steps,
            'test_type'=> $test_type,
            'lesson_id'=> $lesson_id    //нужно для кнопки назад
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

        $created = Test::create($request->validated());

		if($created) {
			return redirect()->route('admin.lesson.show')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $courses = Course::all();
        $lessons = Lesson::all();
        $test_steps = TestStep::all();
        $test_type = TestType::all();

        return view('admin.test.edit',[
            'test' => $test,
            'courses' => $courses,
            'lessons' => $lessons,
            'test_steps'=> $test_steps,
            'test_type'=> $test_type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Test $test)
    {
        $validated = $request->validated();
        $updated = $test->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.lesson.show',['lesson' => $test->lesson_id])
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        try{
            $test->delete();
            return redirect()->route('admin.lesson.show',['lesson' => $test->lesson_id])
            ->with('success', 'Запись успешно удалена');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
    }
}
