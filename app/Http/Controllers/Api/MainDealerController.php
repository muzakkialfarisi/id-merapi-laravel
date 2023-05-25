<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\MainDealerRepository;
use App\Validators\MasterValidator;

use Illuminate\Http\Request;

class MainDealerController extends Controller
{
    public function index(Request $request)
    {
        $param = $request->all();

        $validate = (new MasterValidator)->list($param);
        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors()->first(),
                'data' => null
            ]);
        }

        $data = (new MainDealerRepository())->get_list($param);

        return response()->json([
            'status' => true,
            'message' => 'Success!',
            'data' => $data
        ]);
    }
}
