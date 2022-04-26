<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\CreateRequest;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function store(CreateRequest $request)
    {

        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return response()->json($user, 201);
    }

}
