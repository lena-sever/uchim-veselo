<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\CreateRequest;
use Illuminate\Support\Facades\Log;
use App\Services\UploadService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.index',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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

        $validated['is_admin'] = ($request->is_admin == '1')?1:0;
        $validated['password'] = Hash::make($validated['password']);

		if($request->hasFile('photo')) {
            //добавление картинки локально
			$validated['photo'] = app(UploadService::class)->start_user_photo($request->file('photo'),$validated['name']);
            //добавление картинки в бд
            $validated['photo']='/'.$validated['photo'];
        }
        //dd($validated);
        $created = User::create($validated);

		if($created) {
			return redirect()->route('admin.user.index')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, User $user)
    {
        $validated = $request->validated();

        //проверка на новый пароль пока не работает
        /*if($validated['password']){
            $validated['password'] = Hash::make($validated['password']);
        }*/

        //$validated['is_admin'] = ($request->is_admin == '1')?1:0;

		if($request->hasFile('photo')) {
            //добавление картинки локально
			$validated['photo'] = app(UploadService::class)->start_user_photo($request->file('photo'),$validated['name']);
            //добавление картинки в бд
            $validated['photo']='/'.$validated['photo'];
        }

        //dd($request,$validated);
        $updated = $user->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.user.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
                ->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $page = explode("/", $_SERVER['HTTP_REFERER']);
        $page = end($page);

        //удаление картинки при редактировании
        if($page == "edit"){
            $validated['photo'] = null;
            Storage::delete($user->photo);
            $updated = $user->fill($validated)->save();
            return back();
        }
        else{
            try{
                $user->delete();
                return redirect()->route('admin.user.index')
                ->with('success', 'Запись успешно удалена');
            }catch(\Exception $e){
                Log::error("Ошибка удаления");
            }
        }
    }

    public function toggleAdmin(User $user){
        try{
            if ($user->is_admin == 1){
                $validated['is_admin'] = 0;
                $user->fill($validated)->save();
                return back();

            } else {
                $validated['is_admin'] = 1;
                $user->fill($validated)->save();
                return back();
            }
        }catch(\Exception $e){
            Log::error('Ошибка смены статуса');
        }
    }

}
