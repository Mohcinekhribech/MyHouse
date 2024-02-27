<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;
    public function login(LoginRequest $request)
    {
        $request->validated($request->all());
        if(!Auth::attempt($request->only(['email','password'])))
        {
            return $this->error('','Credentials do not match',401);
        }
        $user = User::where('email',$request->email)->first();
        return $this->succes([
            'user'=>$user,
            'token'=>$user->createToken('API Token of '. $user->name)->plainTextToken
        ]);
    }
    public function register(StoreUserRequest $request){
           $request->validated($request->all());
           $user = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'avatar' =>$request->avatar,
            'role'=>$request->role,
            'password'=>Hash::make($request->password)
           ]);

           return $this->succes([
            'user' => $user,
            'token' => $user->createToken('API Token of '. $user->name)->plainTextToken
           ]);
    }
    public function Logout()
    {
        if(Auth::user())
        {
            Auth::user()->currentAccessToken()->delete();
        }
        return $this->succes([
            'message' => "you are logged out"
        ]);
    }
}
