<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class FeatureRequest extends FormRequest
{
    public function upsert($params)
    {
        $validate['name'] = 'required|unique:features,name';
        $validate['is_active'] = 'required|numeric|in:0,1';

        if (isset($params['id'])) {
            $validate['id'] = 'required|numeric|exists:features,id';
            $validate['name'] = 'required|unique:features,name,' . $params['name'] . ',name';
        }

        return Validator::make($params, $validate);
    }
}
