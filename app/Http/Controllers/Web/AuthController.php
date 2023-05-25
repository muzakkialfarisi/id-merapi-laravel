<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebAuthentication;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_process(WebAuthentication $request)
    {
        $credentials = $request->getCredentials();
        
        if (!Auth::validate($credentials)) {
            return redirect()->route('auth.login')->with(['error' => 'Username or Password incorrect!']);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
        return redirect()->route('dashboard.index');
    }
}
