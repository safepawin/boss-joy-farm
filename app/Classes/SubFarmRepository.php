<?php

namespace App\Classes;

class SubFarmRepository
{
    public function __construct()
    {
    }

    public function save($subFarm)
    {
        $subFarm = SubFarm::find($request->sub_farm_id);
        $subFarm->qty = $request->qty;
        $subFarm->died_qty = $request->died_qty;
        $subFarm->remaining_qty = $request->remaining_qty;
        $subFarm->product_qty = $request->product_qty;
        $subFarm->release = $request->release;
        $subFarm->save();
    }
}
