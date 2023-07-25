<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubFarmDetail extends Model
{
    use HasFactory;

    public function sub_farm()
    {
        return $this->belongsTo(SubFarm::class);
    }
}
