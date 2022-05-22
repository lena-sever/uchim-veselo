<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Messenger;
use App\Http\Requests\User\CreateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Laravolt\Avatar\Avatar;


class UserController extends Controller
{
    public function test_form()
    {
        return view('account.test_form', []);
    }

    public function show(User $user){
        $course = DB::table('user_courses')
            ->where('user_id',$user->id)
            ->join('courses', 'courses.id', '=', 'user_courses.course_id')
            ->join('authors', 'authors.id', '=', 'courses.author_id')
            ->join('painters', 'painters.id', '=', 'courses.painter_id')
            ->select(
                'user_courses.id as id',
                'user_courses.price as price',
                'user_courses.payment as payment',
                'user_courses.updated_at as updated_at',
                'courses.title as course_title',
                'courses.img as course_img',
                'authors.name as name_author',
                'painters.name as name_painter',
            )
            ->get();
        $user->course = $course;

        $user = json_encode($user, JSON_UNESCAPED_UNICODE);

        return $user;
    }

    public function store(CreateRequest $request)
    {
        $validated = $request->validated();

        $check_email = DB::table('users')
            ->where('email', $validated['email'])
            ->first();
        if ($check_email) return 'Такой email уже зарегистрирован. Попробуйте войти.';

        $validated['password'] = Hash::make($validated['password']);
        $validated['session_token'] =  Str::random(60);

        $avatar = new Avatar(config("laravolt.avatar"));
        $validated['photo'] = $avatar->create($validated['name'])->setDimension(85, 85)->toSvg();

        dd($validated);
        $user = User::create($validated);
        if ($user) {
            return json_encode($user, JSON_UNESCAPED_UNICODE);
        } else return 'Ошибка регистрации';
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email:rfc,dns',
            'password' => 'required|string|min:7',
        ]);

        //получить id по email и сравнить с хешем пароля
        $user = DB::table('users')->where('email',  $validated['email'])->first();
        if ($user) {
            // dd($user);
            if (password_verify($validated['password'], $user->password)) {
                return json_encode($user, JSON_UNESCAPED_UNICODE);
            } else return 'Неверный пароль';
        } else return 'Неверный email';
    }

    public function auth(Request $request)
    {

        $validated = $request->validate([
            'session_token' => 'required|string|min:7',
        ]);

        //получить user по remember_token
        $user = DB::table('users')
            ->where('session_token',  $validated['session_token'])
            ->select(
                'id',
                'name',
                'email',
                'session_token',
                'photo'
            )
            ->first();
        if ($user) {
            return json_encode($user, JSON_UNESCAPED_UNICODE);
        } else return 'Неверный токен сессии';
    }

    public function messange(Request $request)
    {
        $validated = $request->validate([
            'user_id' => '',
            'name' => 'required|string|min:2',
            'email' => 'required|string|email:rfc,dns',
            'message' => 'required|string|min:2',
        ]);

        $messange = Messenger::create($validated);
        if ($messange) {
            return json_encode($messange, JSON_UNESCAPED_UNICODE);
        } else return 'Ошибка отправки сообщения';
    }
}
