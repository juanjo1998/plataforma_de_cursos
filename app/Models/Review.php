<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // asignacion masiva

    protected $guarded = ['id'];

    // ? relacion uno a muchos inversa

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // ? relacion uno a muchos inversa

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
