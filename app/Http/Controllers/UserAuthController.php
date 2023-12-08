<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;
class UserAuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function registerUser(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'mobile_no' => 'required|max:10',
            'password' => [
                'required',
                'min:6',
                'max:12',
                'regex:/^(?=.*[0-9])(?=.*[A-Z])(?=.*[@#$%^&+=!]).*$/',
            ],

            'confirmPassword' => 'required|same:password',
        ]);

        $user = new User();
        $user->username = $req->username;
        $user->email = $req->email;
        $user->mobile_no = $req->mobile_no;
        $user->password = Hash::make($req->password);
        $user->save();

        if ($user) {
            return back()->with('success', 'User registered succesfully');
        } else {
            return back()->with('failed', 'User is not registered');
        }
    }

    public function loginUser(Request $req)
    {
        $req->validate([

            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'max:12',
                'regex:/^(?=.*[0-9])(?=.*[A-Z])(?=.*[@#$%^&+=!]).*$/',
            ],


        ]);

        $user = User::where('email', '=', $req->email)->first();
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                $req->session()->put('loginId', $user->id);
                return redirect('/dashboard');
            } else {
                return back()->with('failed', 'Password incorrect');
            }
        } else {
            return back()->with('failed', 'The email is not registered');
        }
    }

    public function dashboard()
    {
        $data=array();
        if (Session::has('loginId')){
            $data=User::where('id', '=',Session::get('loginId') )->first();
        }
        return view('dashboard',compact('data'));
    }

    public function logout()
    {
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/login');
        }
    }

}
