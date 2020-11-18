<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    //
    public function index() {
        if (request()->session()->get('user'))
        {
            return redirect('/logs');
        }

        return view('pages.index');
    }

    public function login(Request $request) {
        $method = $request->method();

        if ($method == 'POST')
        {
            $username= $request->input('username');
            $password = $request->input('password');
            
            $user = User::where('username', $username)->where('password', $password)->get();

            if (count($user) > 0) {
                $request->session()->put('user', $username);
                return redirect('/logs');
            }

            return view('pages.index');
        }
        
        return redirect('/');
    }
}
