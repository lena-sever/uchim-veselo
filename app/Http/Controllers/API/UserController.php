<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\CreateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function store(CreateRequest $request)
    {

        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $validated['remember_token'] =  Str::random(60);

        $user = User::create($validated);

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|string|email:rfc,dns',
            'password' => 'required|string|min:7',
        ]);

        //получить id по email и сравнить с хешем пароля
        $user = DB::table('users')->where('email',  $validated['email'])->first();
        if (password_verify($validated['email'], $user->password)) {
            return json_encode($user, JSON_UNESCAPED_UNICODE);
        } else return false;
    }

    
}
