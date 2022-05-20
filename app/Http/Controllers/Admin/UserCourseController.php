<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use App\Http\Requests\UserCourse\CreateRequest;
use App\Http\Requests\UserCourse\EditRequest;
use Illuminate\Support\Facades\Log;

class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user_course = UserCourse::where('user_id','=',$user->id)->get();

        return view('admin.usercourse.index',[
            'user_course' => $user_course,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = explode("/", $_SERVER['HTTP_REFERER']);
        $user_id = end($user_id);
        $users = User::all();
        $courses = Course::all();
        //dd($user_id,$user);

        return view('admin.usercourse.create',[
            'users' => $users,
            'courses' => $courses,
            'user_id' => $user_id
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

        $created = UserCourse::create($validated);

		if($created) {
			return redirect()->route('admin.usercourse',['user'=> $validated['user_id']])
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function show(UserCourse $userCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCourse $userCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, UserCourse $userCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCourse $userCourse)
    {
        //dd($userCourse);
        try{
            $userCourse->delete();
            return redirect()->route('admin.usercourse',['user'=> $userCourse->user_id])
            ->with('success', 'Запись успешно удалена');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
    }
}
