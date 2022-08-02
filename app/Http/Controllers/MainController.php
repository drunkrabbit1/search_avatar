<?php

namespace App\Http\Controllers;

use App\Enums\AppType;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'app_types' => AppType::cases(),
        ]);
    }
}
