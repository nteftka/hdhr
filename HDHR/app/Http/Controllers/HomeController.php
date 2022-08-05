<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    // public function index(Request $request)
    {
        // if($request['admin_flg'] === 'admin'){
        //   return view('admin/admin_top');
        // } else if($request['admin_flg'] === 'user') {
        //   return view('dh/main');
        // }
        return view('home');
    }
}
