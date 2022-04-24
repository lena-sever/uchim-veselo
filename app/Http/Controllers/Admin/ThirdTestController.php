<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThirdTest;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\Test\Third\EditRequest;
use App\Http\Requests\Test\Third\CreateRequest;

class ThirdTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $third_tests = ThirdTest::all();
        $options = 3;
        $course_id = explode("/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);

        return view('admin.test.create',[
            'courses'=>$courses,
            'third_tests'=>$third_tests,
            'course_id'=>$course_id,
            'options' => $options
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $created = ThirdTest::create( $request->validated());

		if($created) {
            //нужен правльный ридерект!
			return redirect()->route('admin.test',['course' =>  $request->course_id])
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThirdTest  $third_test
     * @return \Illuminate\Http\Response
     */
    public function show(ThirdTest $third_test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThirdTest  $third_test
     * @return \Illuminate\Http\Response
     */
    public function edit(ThirdTest $third_test)
    {
        //пока null
        //dd($third_test);
        $courses = Course::all();
        $options = 3;
        $course_id = explode("/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);

        return view('admin.test.edit',[
            'third_test' => $third_test,
            'courses' => $courses,
            'course_id' => $course_id,
            'options' => $options
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  \App\Models\ThirdTest  $third_test
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, ThirdTest $third_test)
    {
        $validated = $request->validated();
        $updated = $third_test->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.test',['course' => $third_test->course_id])
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThirdTest  $third_test
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThirdTest $third_test)
    {
        try{
            $third_test->delete();
            return redirect()->route('admin.test',['course' => $third_test->course_id])
            ->with('success', 'Запись успешно удалена');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
    }

    public function answer(Request $request){

       /* $course_id = explode("/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);

        $test_id = explode("/", $_SERVER['REQUEST_URI']);
        $test_id = end($test_id);


        $right_answer = ThirdTest::where('id','=',$request->test)
        ->value('right_answer');


        $description = ThirdTest::where('id','=',$request->test)
        ->value('description');


        if ($request->right_answer == $right_answer){
            return redirect()->route('admin.test',['course' => $course_id])
            ->with('success', 'Верно');
        }
        else{
            return redirect()->route('admin.test',['course' => $course_id])
            ->with('error', 'Неверно. Прочитет описание слова: '.$description);
        }
*/

    }
}
