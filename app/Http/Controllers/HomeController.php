<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function index(Request $request)
    {

        $curentUserId = auth()->id();

        $users = DB::table('users')->where('id', '!=', $curentUserId)->get();

        $privat_list = DB::table('user_lists')->where('user_id', '=', $curentUserId)->get();


        //$users = User::all();


        return view('users', ['users'=>$users,'userid'=>$curentUserId,'privat_list'=>$privat_list]);



        //return view('home');


    }


 
    public function logout(Request $request)
    {

      $request->session()->flush();
      return redirect()->route('welcome');    

    }
  
    

}
