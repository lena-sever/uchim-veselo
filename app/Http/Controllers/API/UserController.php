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


class UserController extends Controller
{
    public function test_form()
    {
        return view('account.test_form', []);
    }


    public function store(CreateRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $validated['session_token'] =  Str::random(60);

        $user = User::create($validated);
        if ($user) {
            return json_encode($user, JSON_UNESCAPED_UNICODE);
        } else return 'ошибка регистрации';
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email:rfc,dns',
            'password' => 'required|string|min:7',
        ]);

        //получить id по email и сравнить с хешем пароля
        $user = DB::table('users')->where('email',  $validated['email'])->first();
        // dd($user);
        if (password_verify($validated['password'], $user->password)) {
            return json_encode($user, JSON_UNESCAPED_UNICODE);
        } else return 'неверный логин или пароль';
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
            )
            ->first();
        if ($user) {
            return json_encode($user, JSON_UNESCAPED_UNICODE);
        } else return 'неверный токен сессии';
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
        } else return 'ошибка отправки сообщения';
    }


}
