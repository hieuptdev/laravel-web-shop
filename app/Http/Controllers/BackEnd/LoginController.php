<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function getLogin()
    {
        return view('backend.login');
    }
    function postLogin(LoginRequest $r)
    {

        // if ($r->email == 'admin@gmail.com' && $r->password == '123456') {
        //     session()->put('email', $r->email);
        //     return redirect('admin');
        // } else {
        //     return redirect('login')->withInput();
        // }
        $email = $r->email;
        $password = $r->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('admin');
        }
        if (Auth::viaRemember()) {
            echo old('email');
        } else {
            return redirect('login')->with('thongbao', 'Tài khoản hoặc mật khẩu không chính xác')->withInput();
        }
    }


    function getIndex()
    {
        return view('backend.index');
    }

    public function logOut()
    {
        Auth::logout();
        Auth::viaRemember();
        return redirect('login');
    }
}
