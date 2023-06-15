<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class BackEndRequest extends FormRequest
{
    public function upsert($params)
    {
        $unique_rule = null;
        if (isset($params['id'])) {
            $validate['id'] = ['required', 'exists:back_ends,id'];
            $unique_rule    = Rule::unique('back_ends')->where(function ($query) use ($params) {
                $query->whereNull('deleted_at')
                    ->where('id', '!=', $params['id'])
                    ->where('main_dealer_id', $params['main_dealer_id'] ?? 1);
            });
        }

        $validate['main_dealer_id'] = ['required', 'exists:main_dealers,id'];
        $validate['name']           = ['required'];
        $validate['base_url']       = ['required', $unique_rule];
        $validate['is_active']      = ['required', 'numeric', 'in:0,1'];

        if (!isset($params['id'])) {
            $validate['base_url']   = ['required', 'unique:back_ends,base_url'];
        }

        return Validator::make($params, $validate);
    }
}
