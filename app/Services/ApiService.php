<?php

namespace App\Services;

use App\Repositories\ApiRepository;
use App\Repositories\BackEndRepository;
use App\Transformers\Transformer;
use App\Transformers\ApiTransformer;

class ApiService
{
    private Int
        $main_dealer_id = 0;

    private string
        $back_end_name;

    public function set_main_dealer_id(Int $main_dealer_id): self
    {
        $this->main_dealer_id = $main_dealer_id;
        return $this;
    }

    public function set_back_end_name(string $back_end_name): self
    {
        $this->back_end_name = $back_end_name;
        return $this;
    }

    public function getApi()
    {
        $query_back_end['conditions'] = [
            [
                'field' => 'main_dealer_id',
                'value' => $this->main_dealer_id
            ],
            [
                'field' => 'name',
                'value' => $this->back_end_name
            ],
            [
                'field' => 'is_active',
                'value' => 1
            ]
        ];

        $back_end = (new BackEndRepository())
            ->get_first($query_back_end);

        if (!isset($back_end)) {
            return false;
        }

        $back_end = $back_end->with(['apis' => function ($query) {
            $query = $query->where('is_active', 1);
        }])->first();

        if ($back_end->apis->count() <= 0) {
            return false;
        }

        $data = (new Transformer())->buildCollection($back_end->apis, new ApiTransformer);

        return $data;
    }
}
