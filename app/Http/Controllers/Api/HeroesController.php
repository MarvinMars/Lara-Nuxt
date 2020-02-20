<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hero;

class HeroesController extends Controller
{
    public function show( string $slug)
    {
        $hero = Hero::where('slug', $slug)->get()
            ->first()->load('slides');
        return response()->json(['data' => $hero]);

    }
}
