<?php

namespace App\Http\Controllers\Auth;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginFacebookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => ['redirectToProvider'],
            ]);
    
    }
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    // /**
    //  * Obtain the user information from Facebook.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
     public function handleProviderCallback()
     {

        $userFacebook = Socialite::driver('facebook')->stateless()->user();

        $user = User::where('email', $userFacebook->email)->first();

        if(!$user){
            $user = new User;
            $user->name = $userFacebook->name;
            $user->email = $userFacebook->email;
            $user->password = '123456';
            $user->verified = '1';
            $user->save();
        }

        $credentials = ['email' => $user->email, 'password' => $user->password];

        return response()->json(['data' => $credentials]);

     }
    

    public function facebook($user) {
        $credentials = ['email' => $user->email, 'password' => $user->password];

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or password doesn\'t exist'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()->name,
            'email' => auth()->user()->email,
            'password' => auth()->user()->password
        ]);
    }
}
