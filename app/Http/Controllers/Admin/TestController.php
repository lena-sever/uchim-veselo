<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\First\EditRequest as FirstEditRequest;
use App\Http\Requests\Test\First\CreateRequest as FirstCreateRequest;
use App\Http\Requests\Test\Second\EditRequest as SecondEditRequest;
use App\Http\Requests\Test\Second\CreateRequest as SecondCreateRequest;
use App\Http\Requests\Test\Third\EditRequest as ThirdEditRequest;
use App\Http\Requests\Test\Third\CreateRequest as ThirdCreateRequest;
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
        //получаем id главы
        $lesson_id = $_REQUEST['lesson'];

        $course_id = explode("course/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);

        $lessons = Lesson::all();
        $first_tests = FirstTest::all();
        $second_tests = SecondTest::all();
        $third_tests = ThirdTest::all();

        return view('admin.test.index',[
            'lessons' => $lessons,
            'lesson_id' => $lesson_id,
            'course_id' => $course_id,
            'first_tests' => $first_tests,
            'second_tests' => $second_tests,
            'third_tests' => $third_tests
        ]);
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
        $first_tests = FirstTest::all();
        $second_tests = SecondTest::all();
        $third_tests = ThirdTest::all();
        $course_id = explode("course/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);
        $options = [1,2,3];

        $lesson_id = explode("/", $_SERVER['HTTP_REFERER']);
        $lesson_id = end($lesson_id);

        return view('admin.test.create',[
            'courses'=>$courses,
            'lessons'=>$lessons,
            'first_tests'=>$first_tests,
            'second_tests'=>$second_tests,
            'third_tests'=>$third_tests,
            'course_id'=>$course_id,
            'options' => $options,
            'lesson_id'=> $lesson_id    //нужно для кнопки назад
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FirstCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FirstCreateRequest $request)
    {
        $validated = $request->validated();
        switch($request->test_type_id){
            case 1:
                //костыль!
                $validated['lesson_id'] = 3;
                $created = FirstTest::create($validated);
                break;
            case 2:
               // $created = SecondTest::create($validated);
                break;
            case 3:
                //$created = ThirdTest::create($validated);
                break;
        }

		if($created) {
            //нужен правльный ридерект!
			return redirect()->route('admin.course.index')
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
    public function edit($test)
    {
        //пока не работает!
        $courses = Course::all();
        $lessons = Lesson::all();
        $first_tests = FirstTest::all();
        $second_tests = SecondTest::all();
        $third_tests = ThirdTest::all();

        $options = [1,2,3];
        dd($test,$_SERVER['HTTP_REFERER']);

        return view('admin.test.edit',[
            'test' => $test,
            'courses' => $courses,
            'lessons' => $lessons,
            'options' => $options
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update( $request,  $test)
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

        //выбор описания для слова в тесте по id
        $description = $first_test->where('id','=',$request->test)
        ->value('description');

        //сравнение выбора пользователя и правильного ответа
        if ($request->right_answer == $right_answer){
            return redirect()->route('lesson.show',['lesson' => $lesson_id])
            ->with('success', 'Верно');
        }
        else{
            return redirect()->route('lesson.show',['lesson' => $lesson_id])
            ->with('error', 'Неверно. Прочитет описание слова: '.$description);
        }

    }
}
