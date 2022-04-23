<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\First\EditRequest;
use App\Http\Requests\Test\First\CreateRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\FirstTest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirstTestController extends Controller
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
        $first_tests = FirstTest::all();
        $options = 1;
        $course_id = explode("/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);

        return view('admin.test.create',[
            'first_tests'=>$first_tests,
            'course_id'=>$course_id,
            'options' => $options,
            'courses' => $courses
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
			return redirect()->route('admin.test',['course'=>$request->course_id])
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
    public function show($first_test)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FirstTest $first_test
     * @return \Illuminate\Http\Response
     */
    public function edit(FirstTest $first_test)
    {
//приходит null -> $first_test
        $options = 1;
        $courses = Course::all();
        $course_id = explode("/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);

        return view('admin.test.edit',[
            'first_test' => $first_test,
            'courses' => $courses,
            'course_id' => $course_id,
            'options' => $options,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  \App\Models\FirstTest $first_test
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request,FirstTest $first_test)
    {
        $validated = $request->validated();
        $updated = $first_test->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.test.show',['course' => $first_test->course_id])
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FirstTest $first_test
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirstTest $first_test)
    {
        //null приходит((
        try{
            $first_test->delete();
            return redirect()->route('admin.test',['course' => $first_test->course_id])
            ->with('success', 'Запись успешно удалена');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
    }

    public function answer(Request $request){

        $course_id = explode("/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);

        $test_id = explode("/", $_SERVER['REQUEST_URI']);
        $test_id = end($test_id);

        //выбор правильного ответа в тесте по id
        $right_answer = FirstTest::where('id','=',$test_id)
        ->value('right_answer');

        //выбор описания для слова в тесте по id
        $description = FirstTest::where('id','=',$test_id)
        ->value('description');

        //сравнение выбора пользователя и правильного ответа
        if ($request->right_answer == $right_answer){
            return redirect()->route('admin.test',['course' => $course_id])
            ->with('success', 'Верно');
        }
        else{
            return redirect()->route('admin.test',['course' => $course_id])
            ->with('error', 'Неверно. Прочитет описание слова: '.$description);
        }

    }
}