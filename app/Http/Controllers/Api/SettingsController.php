<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Setting;

class SettingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response|array
     */
    public function index()
    {
        $settings =  Setting::where('slug','footer')->get();
        return response()->json(['settings' => $settings]);
    }
}
