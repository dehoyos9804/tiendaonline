<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth');
        
        //$id = Auth::id();
        //$user = Persona::where('users_id', $id)->first();
        //\Config::set('auth_tipo_user', $id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //return view('home');
        $id =  Auth::id();
        $user = Persona::where('users_id', $id)->first();
        \View::share('user_auth', $user);
        return view('admin.index');
    }
}
