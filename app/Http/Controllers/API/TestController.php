<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\Lesson;


class TestController extends Controller
{

    public function show_first_test(Lesson $lesson)
    {
        // return json_encode($sliders, JSON_UNESCAPED_UNICODE);
    }
}
