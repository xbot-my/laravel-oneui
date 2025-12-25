<?php

namespace XBot\OneUI\Http\Controllers;

use Illuminate\Routing\Controller;

class ExampleController extends Controller
{
    public function index()
    {
        return view('oneui::examples.index');
    }
}
