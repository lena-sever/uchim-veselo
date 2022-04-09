<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Mail;
use App\Http\Requests\Mail\EditRequest;
use App\Http\Requests\Mail\CreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mail = Mail::all();
        return view('admin.mail.index',[
            'mail' => $mail
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mail.create');
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

        $created = Mail::create($validated);

		if($created) {
			return redirect()->route('course.index')
				     ->with('success', 'Сообщение успешно отправленно');
		}

		return back()->with('error', 'Не удалось отправитьсообщение')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail  $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail  $mail)
    {
        /*return view('admin.mail.edit',[
            'mail' => $mail
        ]);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Mail $mail)
    {
        $validated = $request->validated();
        $updated = $mail->fill($validated)->save();

        if($updated) {
            return redirect()->route('admin.mail.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail  $mail)
    {
        try{
            $mail->delete();
            return redirect()->route('admin.mail.index')
            ->with('success', 'Сообщение успешно удалена');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
    }
}
