<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\SubFarm;
use Illuminate\Http\Request;

class SubFarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->farm_id) {
            $request->session()->put('farm_id', $request->farm_id);
            $farm = Farm::find($request->farm_id);
            $request->session()->put('farm_name', $farm->name);
        }
        $subFarms = SubFarm::where('farm_id', session()->get('farm_id'))->get();
        return view('sub-farms.index', compact('subFarms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subFarm = new SubFarm();
        return view('sub-farms.create', [
            'subFarm' => $subFarm,
            'url' => route('sub-farms.store'),
            'method' => "POST"
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
        $subFarm = new SubFarm();
        $subFarm->name = $request->name;
        $subFarm->qty = $request->qty;
        $subFarm->died_qty = $request->died_qty;
        $subFarm->remaining_qty = $request->remaining_qty;
        $subFarm->description = $request->description;
        $subFarm->release = $request->release;
        $subFarm->farm_id = session()->get('farm_id');
        $subFarm->save();
        if ($request->img) {
            $subFarm->addMediaFromRequest("img")->toMediaCollection();
        }

        return redirect()->route('sub-farms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubFarm  $subFarm
     * @return \Illuminate\Http\Response
     */
    public function show(SubFarm $subFarm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubFarm  $subFarm
     * @return \Illuminate\Http\Response
     */
    public function edit(SubFarm $subFarm)
    {
        return view('sub-farms.create', [
            'subFarm' => $subFarm,
            'url' => route('sub-farms.update', $subFarm->id),
            'method' => "PUT"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubFarm  $subFarm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubFarm $subFarm)
    {
        $subFarm->name = $request->name;
        $subFarm->qty = $request->qty;
        $subFarm->died_qty = $request->died_qty;
        $subFarm->remaining_qty = $request->remaining_qty;
        $subFarm->description = $request->description;
        $subFarm->release = $request->release;
        $subFarm->save();

        if ($request->img) {
            $subFarm->clearMediaCollection();
            $subFarm->addMediaFromRequest("img")->toMediaCollection();
        }

        return redirect()->route('sub-farms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubFarm  $subFarm
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubFarm $subFarm)
    {
        //
    }
}
