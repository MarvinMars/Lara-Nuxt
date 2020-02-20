<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;


class DefaultController extends Controller
{
    public function index()
    {
        return view('admin.layout.index');
    }

    public function login()
    {
        return Redirect::route('brackets/admin-auth::admin/login');
    }

    public function register()
    {
        return Redirect::route('brackets/admin-auth::admin/login');
    }
}
