<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\EditRequest;
use App\Http\Requests\Slider\CreateRequest;
use App\Models\Lesson;
use Illuminate\Support\Facades\Log;
use App\Models\Slider;
use App\Services\UploadService;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
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
        $lessons = Lesson::all();
        $lesson_id = explode("lesson/", $_SERVER['HTTP_REFERER']);
        $lesson_id = end($lesson_id);

        return view('admin.slider.create',[
            'lessons' => $lessons,
            'lesson_id' => $lesson_id
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

        //добавление локально пока не работает
		if($request->hasFile('img')) {
            $validated['img'] = app(UploadService::class)->rename($request->file('img'),$validated['lesson_id']);
			$validated['img'] = app(UploadService::class)->start_slider_img($request->file('img'),$validated['img']);
            $validated['img']='/'.$validated['img'];
        }
        if ($request->hasFile('music')){
            $validated['music'] = app(UploadService::class)->rename($request->file('music'),$validated['lesson_id']);
			$validated['music'] = app(UploadService::class)->start_music($request->file('music'),$validated['music']);
            $validated['music']='/'.$validated['music'];
        }
//dd($validated);
        $created = Slider::create($validated);

		if($created) {
			return redirect()->route('admin.lesson.show',['lesson'=>$validated['lesson_id']])
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $lessons = Lesson::all();
        $lesson_title = Lesson::where('id','=',$slider->lesson_id)->value('title');
        return view('admin.slider.edit',[
            'slider' => $slider,
            'lessons' => $lessons,
            'lesson_title' => $lesson_title
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Slider $slider)
    {
        $validated = $request->validated();

		if($request->hasFile('img')) {$validated['img'] = app(UploadService::class)->rename($request->file('img'),$validated['lesson_id']);
			$validated['img'] = app(UploadService::class)->start_slider_img($request->file('img'),$validated['img']);
            $validated['img']='/'.$validated['img'];

        }
        if ($request->hasFile('music')){
            $validated['music'] = app(UploadService::class)->rename($request->file('music'),$validated['lesson_id']);
			$validated['music'] = app(UploadService::class)->start_music($request->file('music'),$validated['music']);
            $validated['music']='/'.$validated['music'];
        }

        $updated = $slider->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.lesson.show',['lesson'=>$validated['lesson_id']])
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $page = explode("/", $_SERVER['HTTP_REFERER']);
        $page = end($page);
//dd($slider,$page);
        //удаление музыки или картинки при редактировании пока не работает
        if($page == "edit"){
            $validated['img'] = null;
            Storage::delete($slider->img);
            $updated = $slider->fill($validated)->save();
            return back();
        }
        else{
            try{
                $slider->delete();
                return redirect()->route('admin.lesson.show',['lesson'=> $slider->lesson_id])
                ->with('success', 'Запись успешно удалена');
            }catch(\Exception $e){
                Log::error("Ошибка удаления");
            }
        }
    }
}
