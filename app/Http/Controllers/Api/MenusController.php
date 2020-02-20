<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    public function index()
    {
        $menus = Menu::select('label','url','order','type')
            ->get()
            ->sortBy('order')
            ->groupBy('type');
        return response()->json(['menus'=>$menus]);
    }
}
