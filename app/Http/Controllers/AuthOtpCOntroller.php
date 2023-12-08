<?php

namespace App\Http\Controllers;
use App\Models\AuthMobile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthOtpCOntroller extends Controller
{
    public function login()
    {
        return view('auth.otp_login');
    }

    public function generate(Request $req)
    {
        $req->validate(
            [
                'mobile_no' => 'required|exists:users,mobile_no'
            ]
        );

        $verification_code=$this->generateOtp($req->mobile_no);
       
    }

    public function generateOtp($mobile_no)
    {
        $user=User::where('mobile_no',$mobile_no)->first();

        $verificationcode=AuthMobile::where('user_id',$user->id)->latest()->first();

        $now=Carbon::now();
        if($verificationcode && $now->isBefore($verificationcode->expire_at))
        {
            return $verificationcode;
        }

        return AuthMobile::create(
            [
                'user_id'=>$user->id,
                'otp'=>rand(123456,999999),
                'expire_at'=>Carbon::now()->addMinutes(10)
            ]
        );
    }
}
