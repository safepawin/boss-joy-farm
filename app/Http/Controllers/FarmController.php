<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'qty' => 'required',
            // 'died_qty' => 'required',
            // 'remaining_qty' => 'required',
            // 'product_qty' => 'required',
            // 'description' => 'nullable',
            // 'release' => 'nullable',
            'description' => 'nullable',
        ]);
        $farm = new Farm();
        $farm->name = $request->name;
        // $farm->qty = $request->qty;
        // $farm->died_qty = $request->died_qty;
        // $farm->remaining_qty = $request->died_qty;
        // $farm->product_qty = $request->product_qty;
        // $farm->description = $request->description;
        // $farm->release = $request->release;
        // $farm->image = "";
        $farm->description = $request->description;
        $farm->save();

        if ($request->img) {
            $farm->clearMediaCollection();
            $farm->addMediaFromRequest("img")->toMediaCollection();
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        //
    }
}
