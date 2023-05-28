<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class UserRequest extends FormRequest
{
    public function registration($param)
    {
        $validate['name']       = ['required'];
        $validate['username']   = ['required', 'unique:users,username'];
        $validate['email']      = ['required', 'email', 'unique:users,email'];
        /*
        $validate['password']   = ['required'];
        $validate['password_confirmation'] = ['required', 'same:password'];
        */
        return Validator::make($param, $validate);
    }

    public function login($param)
    {
        $validate['username']   = ['required'];
        $validate['password']   = ['required'];

        return Validator::make($param, $validate);
    }
}
