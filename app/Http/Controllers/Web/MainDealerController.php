<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainDealerRequest;
use App\Repositories\MainDealerRepository;
use Illuminate\Http\Request;

class MainDealerController extends Controller
{
    public function Index()
    {
        $query['order_field'] = 'id';
        $query['order_sort']  = 'asc';

        $data = (new MainDealerRepository())->get_list($query);

        return view('MainDealer.index')->with(['data' => $data]);
    }

    public function UpsertProcess(Request $request)
    {
        $params = $request->all();

        $validator = (new MainDealerRequest())->upsert($params);

        if ($validator->fails()) {
            return redirect()->route('maindealer.index')->with(['error' => $validator->errors()->first()]);
        }

        if (isset($params['id'])) {
            $data = (new MainDealerRepository())
                ->update_record_by_id($params['id'], $params);
        } else {
            $data = (new MainDealerRepository())
                ->save_record($params);
        }

        if (!$data) {
            return redirect()->route('maindealer.index')->with(['error' => 'Data failed to save!']);
        }

        return redirect()->route('maindealer.index')->with(['success' => 'Data saved successfully!']);
    }
}
