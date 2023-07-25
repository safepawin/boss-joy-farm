<?php

namespace App\Http\Controllers;

use App\Models\SubFarm;
use App\Models\SubFarmDetail;
use Illuminate\Http\Request;

class SubFarmDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subFarmDetails = SubFarmDetail::where('sub_farm_id', $request->sub_farm_id)->get();
        $subFarm = SubFarm::find($request->sub_farm_id);
        return view('sub-farm-details.index', [
            'subFarmDetails' => $subFarmDetails,
            'subFarm' => $subFarm
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $subFarmDetail = new SubFarmDetail();
        $subFarmDetail->sub_farm_id = $request->sub_farm_id;
        return view('sub-farm-details.create', [
            'subFarmDetail' => $subFarmDetail,
            'url' => route('sub-farm-details.store'),
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subFarmDetail = new SubFarmDetail();
        $subFarmDetail->qty = $request->qty;
        $subFarmDetail->died_qty = $request->died_qty;
        $subFarmDetail->remaining_qty = $request->remaining_qty;
        $subFarmDetail->product_qty = $request->product_qty;
        $subFarmDetail->release = $request->release;
        $subFarmDetail->sub_farm_id = $request->sub_farm_id;
        $subFarmDetail->save();

        $subFarm = SubFarm::find($request->sub_farm_id);
        $subFarm->qty = $request->qty;
        $subFarm->died_qty = $request->died_qty;
        $subFarm->remaining_qty = $request->remaining_qty;
        $subFarm->product_qty = $request->product_qty;
        $subFarm->release = $request->release;
        $subFarm->save();

        return redirect()->route('sub-farm-details.index', ['sub_farm_id' => $subFarmDetail->sub_farm_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubFarmDetail  $subFarmDetail
     * @return \Illuminate\Http\Response
     */
    public function show(SubFarmDetail $subFarmDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubFarmDetail  $subFarmDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(SubFarmDetail $subFarmDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubFarmDetail  $subFarmDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubFarmDetail $subFarmDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubFarmDetail  $subFarmDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubFarmDetail $subFarmDetail)
    {
        //
    }
}
