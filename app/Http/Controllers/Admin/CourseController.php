<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Requests\Course\EditRequest;
use App\Http\Requests\Course\CreateRequest;
use App\Models\Author;
use App\Models\Painter;
use Illuminate\Support\Facades\Log;
use App\Services\UploadService;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $authors = Author::all();
        $painters = Painter::all();

        return view('admin.course.index',[
            'courses' => $courses,
            'authors' =>$authors,
            'painters'=>$painters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $painters = Painter::all();

        return view('admin.course.create',[
            'authors' =>$authors,
            'painters' => $painters
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
        $validated = $request->validated();

		if($request->hasFile('image')) {
            //добавление картинки локально
			$validated['img'] = app(UploadService::class)->start($request->file('image'));
            //добавление картинки в бд
            $validated['img']='/'.$validated['img'];
        }
//dd($validated,$request);
        $created = Course::create($validated);

		if($created) {
			return redirect()->route('admin.course.index')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $first_tests = $course->first_tests()->get();
        $second_tests = $course->second_tests()->get();
        $third_tests = $course->third_tests()->get();
        $lessons = $course->lessons()->get();
        $reviews = $course->courseReviews()->get();

        return view('admin.course.show',[
            'course' => $course,
            'lessons' => $lessons,
            'reviews' => $reviews,
            'first_tests'=> $first_tests,
            'second_tests'=> $second_tests,
            'third_tests'=> $third_tests
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $authors = Author::all();
        $painters = Painter::all();

        return view('admin.course.edit',[
            'course' => $course,
            'authors' => $authors,
            'painters' => $painters,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Course $course)
    {
        $validated = $request->validated();

		if($request->hasFile('image')) {
            //добавление картинки локально
			$validated['img'] = app(UploadService::class)->start($request->file('image'));
           //добавление картинки в бд
            $validated['img']='/'.$validated['img'];

        }
        //dd($request,$validated);
        $updated = $course->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.course.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $page = explode("/", $_SERVER['HTTP_REFERER']);
        $page = end($page);

        //удаление картинки при редактировании
        if($page == "edit"){
            $validated['img'] = null;
            Storage::delete($course->img);
            $updated = $course->fill($validated)->save();
            return back();
        }
        else{
            try{
                $course->delete();
                return redirect()->route('admin.course.index')
                ->with('success', 'Запись успешно удалена');
            }catch(\Exception $e){
                Log::error("Ошибка удаления");
            }
        }
    }
}
