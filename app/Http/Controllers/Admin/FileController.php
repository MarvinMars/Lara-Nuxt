<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    public function store(Request $request){
        $file = $request->file('file');
        $url = Storage::put('public', $file);
        return response()->json(['url'=>$url]);
    }
}
