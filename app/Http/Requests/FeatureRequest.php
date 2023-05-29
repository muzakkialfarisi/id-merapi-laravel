<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class FeatureRequest extends FormRequest
{
    public function validate($params)
    {
        $validate['name'] = 'required|unique:feature,name';
        $validate['is_active'] = 'required|numeric|in:0,1';

        if (isset($params['id'])) {
            $validate['id'] = 'required|numeric|exists:feature,id';
            $validate['name'] = 'required|unique:feature,name,' . $params['name'] . ',name';
        }

        return Validator::make($params, $validate);
    }
}
