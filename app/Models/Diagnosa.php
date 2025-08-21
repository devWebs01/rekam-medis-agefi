<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Traits\Uuid;

class Diagnosa extends Model
{
    // use Uuid;
    use HasFactory;
    protected $guarded = [];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
