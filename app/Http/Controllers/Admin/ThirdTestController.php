<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThirdTest;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\Test\Third\EditRequest;
use App\Http\Requests\Test\Third\CreateRequest;
use Illuminate\Support\Arr;

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
        $validated = $request->validated();
        $validated['right_sentence_1']='';
        $validated['words'] = '';


        $variants = [
            [$request->var_1,$request->var_2],
            [$request->var_3,$request->var_4],
            [$request->var_5,$request->var_6],
            [$request->var_7,$request->var_8],
            [$request->var_9,$request->var_10],
            [$request->var_11,$request->var_12],
            [$request->var_13,$request->var_14],
            [$request->var_15,$request->var_16],
            [$request->var_17,$request->var_18],
            [$request->var_19,$request->var_20]
        ];

        $sentences=[
            $request->sentence_1,
            $request->sentence_2,
            $request->sentence_3,
            $request->sentence_4,
            $request->sentence_5,
            $request->sentence_6,
            $request->sentence_7,
            $request->sentence_8,
            $request->sentence_9,
            $request->sentence_10
        ];
        //dd($variants);
        for($i=0;$i<=9;$i++){
            $validated['right_sentence_2'] = $variants[$i][0];
            $validated['right_sentence_3'] = $variants[$i][1];

            if($validated['right_sentence_2'] == null){
                $validated['right_sentence_2'] ='';
            }
            if($validated['right_sentence_3'] == null){
                $validated['right_sentence_3'] ='';
            }

            $validated['right_sentence_1'] = $sentences[$i];
            $sentence = explode(" ",$validated['right_sentence_1']);
            shuffle($sentence);
            $validated['words'] = join("|",$sentence);

            //dd($validated);
            $created = ThirdTest::create($validated);
        }

		if($created) {
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
    public function edit(ThirdTest $test_3)
    {
        $courses = Course::all();
        $options = 3;

        return view('admin.test.edit',[
            'third_test' => $test_3,
            'courses' => $courses,
            'options' => $options
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  \App\Models\ThirdTest  $test_3
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, ThirdTest $test_3)
    {
        $validated = $request->validated();

        if($validated['right_sentence_2'] == null){
            $validated['right_sentence_2'] ='';
        }
        if($validated['right_sentence_3'] == null){
            $validated['right_sentence_3'] ='';
        }
        $validated['words'] = '';
        $sentence = explode(" ",$validated['right_sentence_1']);
        shuffle($sentence);
        $validated['words'] = join("|",$sentence);

        //dd($validated);
        $updated = $test_3->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.test',['course' => $test_3->course_id])
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThirdTest  $test_3
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThirdTest $test_3)
    {
        try{
            $test_3->delete();
            return redirect()->route('admin.test',['course' => $test_3->course_id])
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
