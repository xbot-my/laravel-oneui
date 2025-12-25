<?php

declare(strict_types=1);

namespace XBot\OneUI\Http\Controllers\Examples;

use Illuminate\Routing\Controller;

class EditorController extends Controller
{
    public function __invoke()
    {
        return view('oneui::examples.editors');
    }
}
