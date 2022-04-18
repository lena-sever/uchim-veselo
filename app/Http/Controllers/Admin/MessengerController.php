<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Messenger;
use App\Http\Requests\Messenger\EditRequest;
use App\Http\Requests\Messenger\CreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class MessengerController extends Controller
{
    public function index()
    {
        $messengers = Messenger::all();
        return view('admin.messenger.index',[
            'messengers' => $messengers
        ]);
    }

    public function create()
    {
        //
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

        $created = Messenger::create($validated);

        if ($created) {
            return redirect()->route('course.index')
                ->with('success', 'Сообщение успешно отправленно');
        }

        return back()->with('error', 'Не удалось отправить сообщение')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messenger  $messenger
     * @return \Illuminate\Http\Response
     */
    public function show(Messenger $messenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messenger  $messenger
     * @return \Illuminate\Http\Response
     */
    public function edit(Messenger $messenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messenger  $messenger
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD:app/Http/Controllers/Admin/SiteMessagesController.php
    public function update(EditRequest $request, Messenges $messenges)

=======
    public function update(EditRequest $request, Messenger $messenger)
>>>>>>> ddf474eecce84db31762f5eca0dddd46d26b0162:app/Http/Controllers/Admin/MessengerController.php
    {

        dd($messenges->id);
        $validated = $request->validated();
        $updated = $messenger->fill($validated)->save();

        if ($updated) {
            return redirect()->route('admin.messenger.index')
                ->with('success', 'Ответ отправлен');
        }

        return back()->with('error', 'Не удалось отправить ответ')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messenger  $messenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messenger $messenger)
    {
<<<<<<< HEAD:app/Http/Controllers/Admin/SiteMessagesController.php
        try {
            $messenges->delete();
=======
        try{
            $messenger->delete();
>>>>>>> ddf474eecce84db31762f5eca0dddd46d26b0162:app/Http/Controllers/Admin/MessengerController.php
            return redirect()->route('admin.messenger.index')
                ->with('success', 'Сообщение успешно удалено');
        } catch (\Exception $e) {
            Log::error("Ошибка удаления");
        }
    }
}
