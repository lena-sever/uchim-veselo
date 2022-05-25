<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\CreateRequest;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Log;
use App\Services\UploadService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Laravolt\Avatar\Avatar;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index',[
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }


    public function store(CreateRequest $request)
    {
        $validated = $request->validated();
        $check_email = DB::table('users')
            ->where('email', $validated['email'])
            ->first();
        if ($check_email)
        return back()->with('error', 'Такой email уже зарегистрирован. Попробуйте войти.');


        $validated['is_admin'] = ($request->is_admin == '1')?1:0;
        $validated['password'] = Hash::make($validated['password']);
        $validated['session_token'] =  Str::random(60);

		if($request->hasFile('photo')) {
            //добавление картинки локально
			$validated['photo'] = app(UploadService::class)->start_user_photo($request->file('photo'),$validated['name']);
            //добавление картинки в бд
            $validated['photo']='/'.$validated['photo'];
        } else {
            $avatar = new Avatar(config("laravolt.avatar"));
            $validated['photo'] = $avatar->create($validated['name'])->toBase64();
            //$validated['photo'] = $avatar->create($validated['name'])->setDimension(85, 85)->toSvg();
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


    public function show(User $user)
    {

    }


    public function edit(User $user)
    {
        return view('admin.user.edit',[
            'user' => $user
        ]);
    }


    public function update(EditRequest $request, User $user)
    {
        $validated = $request->validated();

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
