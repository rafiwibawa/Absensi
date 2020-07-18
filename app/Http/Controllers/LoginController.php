<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->middleware('guest')->except('logout');
    }
    
    public function getLogin()
    {
        return view('Login.login');
    }

    public function PostLogin(Request $req)
    {

        if (Auth::attempt([
            'email' => $req["email"],
            'password' => $req["password"]
        ])) {
            return redirect('/');
        }else if(Auth::attempt([
            'name' => $req["email"],
            'password' => $req["password"]
        ])){
            return redirect('/');
        }else {
            return redirect('/login')->with('alert', 'Gagal Login, Silahkan Coba lagi');
        }
    }

    public function forgot()
    {
        return view('Login.email');
    }
}
