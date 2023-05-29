<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class MainDealerRequest extends FormRequest
{
    public function upsert($params)
    {
        $validate['is_active'] = 'required|numeric|in:0,1';
        $validate['name'] = 'required|unique:main_dealers,name';

        if (isset($params['id'])) {
            $validate['id'] = 'required|numeric|exists:main_dealers,id';
            $validate['name'] = 'required|unique:main_dealer,name,' . $params['name'] . ',name';
        }

        return Validator::make($params, $validate);
    }
}
