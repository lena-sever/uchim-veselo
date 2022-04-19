<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\EditRequest;
use App\Http\Requests\Test\CreateRequest;
use App\Models\Lesson;
use App\Models\FirstTest;
use App\Models\SecondTest;
use App\Models\ThirdTest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


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
        $first_test = FirstTest::all();

        $lesson_id = explode("/", $_SERVER['HTTP_REFERER']);
        $lesson_id = end($lesson_id);
//dd($test_steps,$test_type);
        return view('admin.test.create',[
            'courses'=>$courses,
            'lessons'=>$lessons,
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

        $created = FirstTest::create($request->validated());

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
    public function show( $test)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit( $test)
    {
        $courses = Course::all();
        $lessons = Lesson::all();


        return view('admin.test.edit',[
            'test' => $test,
            'courses' => $courses,
            'lessons' => $lessons,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request,  $test)
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
    public function destroy($test)
    {
        try{
            $test->delete();
            return redirect()->route('admin.lesson.show',['lesson' => $test->lesson_id])
            ->with('success', 'Запись успешно удалена');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
    }

    public function answer(FirstTest $first_test,Request $request){
        $lesson_id = $first_test->where('id','=',$request->test)
        ->value('lesson_id');
        //выбор правильного ответа в тесте по id
        $right_answer = $first_test->where('id','=',$request->test)
        ->value('right_answer');
        //сравнение выбора пользователя и правильного ответа
        if ($request->right_answer == $right_answer){
            return redirect()->route('lesson.show',['lesson' => $lesson_id])
            ->with('success', 'Правильно');
        }
        else{
            return redirect()->route('lesson.show',['lesson' => $lesson_id])
            ->with('error', 'Неверно');
        }

    }
}
