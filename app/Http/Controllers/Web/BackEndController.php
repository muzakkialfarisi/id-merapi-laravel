<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEndRequest;
use App\Repositories\BackEndRepository;
use App\Repositories\MainDealerRepository;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    public function Index($main_dealer_id)
    {
        $query['conditions'][] = [
            'field' => 'id',
            'value' => $main_dealer_id ?? 0
        ];

        $query['relationship'] = ['back_ends'];

        $data = (new MainDealerRepository)->get_first($query);

        if (!isset($data)) {
            return redirect()->back()->with(['error' => 'Main Dealer not found!']);
        }

        return view('BackEnd/Index')->with(['data' => $data]);
    }

    public function UpsertProcess(Request $request, $main_dealer_id)
    {
        $params = $request->all();

        if (!isset($main_dealer_id)) {
            return redirect()->route('main_dealer.index')->with(['error' => 'Main Dealer not found!']);
        }

        $validator = (new BackEndRequest())->upsert($params);

        if ($validator->fails()) {
            return redirect()->route('main_dealer.application.index', ['main_dealer_id' => $main_dealer_id])
                ->with(['error' => $validator->errors()->first()]);
        }

        if (isset($params['id'])) {
            $data = (new BackEndRepository())
                ->update_record_by_id($params['id'], $params);
        } else {
            $data = (new BackEndRepository())
                ->save_record($params);
        }

        if (!$data) {
            return redirect()->route('main_dealer.application.index', ['main_dealer_id' => $params['main_dealer_id']])
                ->with(['error' => 'Data failed to save!']);
        }

        return redirect()->route('main_dealer.application.index', ['main_dealer_id' => $params['main_dealer_id']])
            ->with(['success' => 'Data saved successfully!']);
    }
}
