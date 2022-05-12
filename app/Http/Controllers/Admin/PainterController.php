<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Painter;
use App\Http\Requests\Painter\EditRequest;
use App\Http\Requests\Painter\CreateRequest;
use Illuminate\Support\Facades\Log;
use App\Services\UploadService;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Avatar;

class PainterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $painters = Painter::all();

        return view('admin.painter.index',[
            'painters' => $painters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.painter.create');
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

		if($request->hasFile('photo')) {
            //добавление картинки локально
			$validated['photo'] = app(UploadService::class)->start_user_photo($request->file('photo'),$validated['name']);
            //добавление картинки в бд
            $validated['photo']='/'.$validated['photo'];
        } else {
            $avatar = new Avatar(config("laravolt.avatar"));
            $validated['photo'] = $avatar->create($validated['name'])->setDimension(85, 85)->toSvg();
        }
//dd($request,$validated);
        $created = Painter::create($validated);

		if($created) {
			return redirect()->route('admin.painter.index')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painter  $painter
     * @return \Illuminate\Http\Response
     */
    public function show(Painter $painter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painter  $painter
     * @return \Illuminate\Http\Response
     */
    public function edit(Painter $painter)
    {
        $courses = Course::all();
        return view('admin.painter.edit',[
            'painter' => $painter,
            'courses' => $courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  \App\Models\Painter  $painter
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Painter $painter)
    {
        $validated = $request->validated();

		if($request->hasFile('photo')) {
            //добавление картинки локально
			$validated['photo'] = app(UploadService::class)->start_user_photo($request->file('photo'),$validated['name']);
            //добавление картинки в бд
            $validated['photo']='/'.$validated['photo'];
        }

        //dd($request,$validated);
        $updated = $painter->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.painter.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
                ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painter  $painter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Painter $painter)
    {
        $page = explode("/", $_SERVER['HTTP_REFERER']);
        $page = end($page);

        //удаление картинки при редактировании
        if($page == "edit"){
            $validated['photo'] = null;
            Storage::delete($painter->photo);
            $updated = $painter->fill($validated)->save();
            return back();
        }
        else{
            try{
                $painter->delete();
                return redirect()->route('admin.painter.index')
                ->with('success', 'Запись успешно удалена');
            }catch(\Exception $e){
                Log::error("Ошибка удаления");
            }
        }
    }
}
