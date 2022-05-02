<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // asignacion masiva

    protected $guarded = ['id'];

    // ? relacion uno a muchos inversa

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ! relacion polimorfica 

    public function commentable()
    {
        return $this->morphTo();
    }

    // ! relacion uno a muchos polimorfica con este mismo modelo

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    // ! relacion polimorfica uno a muchos

    public function reactions()
    {
        return $this->morphMany(Reaction::class,'reactionable');
    }


}
