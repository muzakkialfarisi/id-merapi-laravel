<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_process()
    {
        return response()->json([
            'status' => false,
            'message' => 'to be announced'
        ]);
    }

    public function register_process(Request $request)
    {
        $params = json_decode(json_encode($request->all()), true);

        $validator = (new UserRequest())->registration($params);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'data' => $validator->errors()
            ]);
        }

        if (!isset($params['id'])) {
            $save = (new UserRepository())
                ->save_record($params);
        } else {
            $query['conditions'] = [
                [
                    'field' => 'id',
                    'value' => $params['id']
                ]
            ];

            $user = (new UserRepository())
                ->get_first($query);

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'user not found',
                ]);
            }

            $save = (new UserRepository())
                ->update_record_by_id($user['id'], $params);
        }

        if (!$save) {
            return response()->json([
                'status' => false,
                'message' => 'data failed to save',
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'data saved successfully',
        ]);
    }
}
