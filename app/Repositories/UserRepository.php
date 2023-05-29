<?php

namespace App\Repositories;


use App\Models\User as UserModel;
use App\Repositories\MasterRepository;
use App\Repositories\AuthRepository;

class UserRepository extends MasterRepository
{
    public $model;

    public function __construct()
    {
        $this->model = new UserModel();
        parent::__construct($this->model);
    }

    public function save_record($params)
    {
        $salt = (new AuthRepository())->salt();
        $avatar = $params['avatar'] ?? 'default-profile-pricture.jpg';

        $data = [
            'name'          => $params['name'],
            'user_role_id'  => $params['user_role_id'],
            'username'      => $params['username'],
            'email'         => $params['email'] ?? null,
            'phone_number'  => $params['phone_number'] ?? null,
            'password'      => (new AuthRepository())->hash($params['username'] . $salt),
            'salt'          => $salt,
            'avatar'        => $avatar,
            'is_active'     => 1,
        ];

        return parent::save_record($data);
    }
}
