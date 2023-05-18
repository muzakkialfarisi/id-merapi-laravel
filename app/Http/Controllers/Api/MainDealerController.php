<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MainDealerModel;
use Illuminate\Http\Request;

class MainDealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = MainDealerModel::all();

        return response()->json([
            'status' => true,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainDealerModel  $mainDealerModel
     * @return \Illuminate\Http\Response
     */
    public function show(MainDealerModel $mainDealerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainDealerModel  $mainDealerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MainDealerModel $mainDealerModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainDealerModel  $mainDealerModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainDealerModel $mainDealerModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainDealerModel  $mainDealerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainDealerModel $mainDealerModel)
    {
        //
    }
}
