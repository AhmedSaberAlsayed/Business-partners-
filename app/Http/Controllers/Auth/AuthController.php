<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\loginRequist;
use App\Http\Requests\Auth\registerRequist;
use App\Http\Traits\Api_designtrait;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use Api_designtrait;

    // public function register(registerRequist $registerReaquest){
    //     $register=User::create([
    //         "name"=> $registerReaquest->name,
    //         "email"=> $registerReaquest->email,
    //         "password"=> bcrypt($registerReaquest->password),
    //         ]);
    //         return $this->api_design(200,"user was registed successfully", $register);
        
    // }

    public function login(loginRequist $loginReaquest){
        $token = JWTAuth::attempt([
        "email"=> $loginReaquest->email,
        "password"=> $loginReaquest->password
    ]);
    if (!empty($token)) {
        $data= User::where('email', $loginReaquest->email)->first();
        return $this->api_design(200,"login succesfull", [$data,$token],null);
    }else {
        return $this->api_design(400,'eror',null, $token->errors());
    }
}
}
