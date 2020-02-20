<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            abort(404);
        }

        return file_get_contents(config('nuxt.page'));
    }
}
