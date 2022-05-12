<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Painter;
use Illuminate\Http\Request;

class PainterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $painters = Painter::all();


        return view('admin.painter.index',[
            'painters' => $painters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painter  $painter
     * @return \Illuminate\Http\Response
     */
    public function show(Painter $painter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painter  $painter
     * @return \Illuminate\Http\Response
     */
    public function edit(Painter $painter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Painter  $painter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Painter $painter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painter  $painter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Painter $painter)
    {
        //
    }
}
