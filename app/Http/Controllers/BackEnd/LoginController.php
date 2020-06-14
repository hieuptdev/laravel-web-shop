<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Carbon\Carbon;

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

        $year_n = Carbon::now()->format('Y');
        $month_n = Carbon::now()->format('m');
        for ($i = 1; $i <= $month_n; $i++) {
            $monthjs[$i] = 'tháng ' . $i;
            $numberjs[$i] = Customer::where('state', 1)->whereMonth('updated_at', $i)->whereYear('updated_at', $year_n)->sum('total');
        }
        $data['monthjs'] = $monthjs;
        $data['numberjs'] = $numberjs;
        $data['order'] = Customer::where('state', 0)->count();
        return view('backend.index', $data);
    }

    public function logOut()
    {
        Auth::logout();
        Auth::viaRemember();
        return redirect('login');
    }
}
