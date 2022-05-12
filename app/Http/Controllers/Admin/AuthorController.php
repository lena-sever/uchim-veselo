<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Author;
use App\Models\Course;
use App\Http\Requests\Author\EditRequest;
use App\Http\Requests\Author\CreateRequest;
use Illuminate\Support\Facades\Log;
use App\Services\UploadService;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Avatar;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();

        return view('admin.author.index',[
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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

        $created = Author::create($validated);

		if($created) {
			return redirect()->route('admin.author.index')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $courses = Course::all();
        return view('admin.author.edit',[
            'author' => $author,
            'courses' => $courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Author $author)
    {
        $validated = $request->validated();

		if($request->hasFile('photo')) {
            //добавление картинки локально
			$validated['photo'] = app(UploadService::class)->start_user_photo($request->file('photo'),$validated['name']);
            //добавление картинки в бд
            $validated['photo']='/'.$validated['photo'];
        }

        //dd($request,$validated);
        $updated = $author->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.author.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
                ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $page = explode("/", $_SERVER['HTTP_REFERER']);
        $page = end($page);

        //удаление картинки при редактировании
        if($page == "edit"){
            $validated['photo'] = null;
            Storage::delete($author->photo);
            $updated = $author->fill($validated)->save();
            return back();
        }
        else{
            try{
                $author->delete();
                return redirect()->route('admin.author.index')
                ->with('success', 'Запись успешно удалена');
            }catch(\Exception $e){
                Log::error("Ошибка удаления");
            }
        }
    }
}
