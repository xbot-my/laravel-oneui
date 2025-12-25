<?php

declare(strict_types=1);

namespace XBot\OneUI\Http\Controllers\Examples;

use Illuminate\Routing\Controller;

class ListController extends Controller
{
    public function __invoke()
    {
        return view('oneui::examples.lists');
    }
}
