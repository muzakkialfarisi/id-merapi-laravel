<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class MasterValidator
{
    public function list($request)
    {
        return Validator::make(
            $request,
            [
                'take' => 'required|numeric|min:0',
                'skip' => 'required|numeric|min:0'
            ]
        );
    }
}
