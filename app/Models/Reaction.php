<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    // asignacion masiva

    protected $guarded = ['id'];

    const LIKE = 1;
    const DISLIKE = 2;

    // ? relacion uno a muchos inversa

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ! relacion polimorfica 

    public function reactionable()
    {
        return $this->morphTo();
    }
}
