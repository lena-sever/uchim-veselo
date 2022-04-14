<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Messenges;
use App\Http\Requests\Messenges\EditRequest;
use App\Http\Requests\Messenges\CreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SiteMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messenges = Messenges::all();
        return view('admin.messenger.index',[
            'messenges' => $messenges
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.messenger.create');
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

        $created = Messenges::create($validated);

		if($created) {
			return redirect()->route('course.index')
				     ->with('success', 'Сообщение успешно отправленно');
		}

		return back()->with('error', 'Не удалось отправить сообщение')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messenges  $messenges
     * @return \Illuminate\Http\Response
     */
    public function show(Messenges  $messenges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messenges  $messenges
     * @return \Illuminate\Http\Response
     */
    public function edit(Messenges  $messenges)
    {
        /*return view('admin.messenger.edit',[
            'messenges' => $messenges
        ]);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messenges  $messenges
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Messenges $messenges)
    {
        $validated = $request->validated();
        $updated = $messenges->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.messenger.index')
                ->with('success', 'Ответ отправлен');
        }

        return back()->with('error', 'Не удалось отправить ответ')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messenges  $messenges
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messenges  $messenges)
    {
        try{
            $messenges->delete();
            return redirect()->route('admin.messenger.index')
            ->with('success', 'Сообщение успешно удалено');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
    }
}
