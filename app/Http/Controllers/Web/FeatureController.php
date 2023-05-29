<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Repositories\FeatureRepository;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function Index()
    {
        $data = (new FeatureRepository())->get_list();

        return view('feature/index')->with(['data' => $data]);
    }

    public function UpsertProcess(Request $request)
    {
        $params = $request->all();

        $validator = (new FeatureRequest())->upsert($params);

        if ($validator->fails()) {
            return redirect()->route('feature.index')
                ->with(['error' => $validator->errors()->first()]);
        }
        if (isset($params['id'])) {
            $data = (new FeatureRepository())
                ->update_record_by_id($params['id'], $params);
        } else {
            $data = (new FeatureRepository())
                ->save_record($params);
        }

        if (!$data) {
            return redirect()->route('feature.index')
                ->with(['error' => 'Data failed to save!']);
        }

        return redirect()->route('feature.index')
            ->with(['success' => 'Data saved successfully!']);
    }
}
