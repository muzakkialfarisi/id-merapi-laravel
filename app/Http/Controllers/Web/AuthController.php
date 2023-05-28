<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_process(Request $request)
    {
        $params = json_decode(json_encode($request->all()), true);

        $validator = (new UserRequest())->login($params);
        if ($validator->fails()) {
            return redirect()->back()->with(['error' => $validator->errors()->first()]);
        }

        $query['conditions'] = [
            [
                'field' => 'username',
                'value' => $params['username']
            ],
        ];

        $user = (new UserRepository())->get_first($query);
        if (!isset($user)) {
            return redirect()->back()->with(['error' => 'user not found, please regist your account!']);
        }

        $password_validation = (new AuthRepository())->hash_check($params['password'] . $user['salt'], $user['password']);
        if ($password_validation) {
            $attempt = Auth::attempt([
                'email'  => $user['email'],
                'password'  => $params['password'] . $user['salt']
            ]);
            if ($attempt) {
                return redirect()->intended('dashboard');
            }
        }

        return redirect()->back()->with(['error' => 'password incorrect!']);
    }
}
