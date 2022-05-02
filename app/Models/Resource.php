<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    // asignacion masiva

    protected $guarded = ['id'];

    // ! relacion polimorfica uno a uno inversa

    public function resourceable()
    {
        return $this->morphTo();
    }
}
