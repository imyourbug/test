<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Toastr;

class UserLoginController extends Controller
{
    public function index()
    {
            return view('login.login',[
                'title' => 'Đăng nhập'
            ]);
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password'=> 'required'
        ]);

        $check = Auth::attempt([
            'email' => $request -> input('email'),
            'password' => $request -> input('password')
        ]);

        if($check){

            Session::put('check', $check);
            return redirect()->route('home');
        }

        Toastr::error('tài khoản hoặc mật khẩu không chính xác','Lỗi');
        return  redirect()->back();
    }

    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function register()
    {
        return view('register.register',[
            'title' => 'Đăng kí'
        ]);
    }

    public function create(Request $request)
    {
        User::create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=>bcrypt($request->input('password'))
        ]);

        Toastr::success('Đăng kí thành công','Thành công');
        return redirect()->route('login-home');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function showChangePasswordForm()
    {
        return view('changepassword.changepassword',[
            'title' => 'Đổi mật khẩu'
        ]);
    }

    public function changePassword(Request $request)
    {
        if (!Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('current-password')
        ]))
        {
            Toastr::error('Email hoặc mật khẩu không chính xác','Lỗi');
            return redirect()->back();
        }

        if ($request->input('current-password') == $request->input('new-password'))
        {
            Toastr::error('Mật khẩu mới không được trùng mật khẩu cũ','Lỗi');
            return redirect()->back();
        }

        Auth::user()->update([
            'password'=> bcrypt($request->input('new-password'))
        ]);

        Toastr::success('Đổi mật khẩu thành công','Success');
        return redirect()->route('home');
    }


}
