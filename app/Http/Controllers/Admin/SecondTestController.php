<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\Second\EditRequest;
use App\Http\Requests\Test\Second\CreateRequest;
use App\Models\Course;
use App\Models\SecondTest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SecondTestController extends Controller
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
        $second_tests = SecondTest::all();
        $options = 2;
        $course_id = explode("/", $_SERVER['HTTP_REFERER']);
        $course_id = end($course_id);

        return view('admin.test.create',[
            'courses'=>$courses,
            'second_tests'=>$second_tests,
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
        $created = SecondTest::create($request->validated());

		if($created) {
			return redirect()->route('admin.test',['course' => $request->course_id])
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecondTest  $second_test
     * @return \Illuminate\Http\Response
     */
    public function show(SecondTest $second_test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondTest  $second_test
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondTest $test_2)
    {
        $courses = Course::all();
        $options = 2;

        return view('admin.test.edit',[
            'second_test' => $test_2,
            'courses' => $courses,
            'options' => $options
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  \App\Models\SecondTest  $second_test
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, SecondTest $test_2)
    {
        $validated = $request->validated();
        $updated = $test_2->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.test',['course' => $test_2->course_id])
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondTest  $second_test
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondTest $test_2)
    {
        try{
            $test_2->delete();
            return redirect()->route('admin.test',['course' => $test_2->course_id])
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


        $right_answer = SecondTest::where('id','=',$request->test)
        ->value('right_answer');


        $description = SecondTest::where('id','=',$request->test)
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
