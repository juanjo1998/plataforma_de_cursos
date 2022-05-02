<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    //leccion culminada

    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }

    // asignacion masiva

    protected $guarded = ['id'];

    // ? relacion uno a uno

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    // ? relacion uno a muchos inversa

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // ? relacion uno a muchos inversa

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    // ? relacion muchos a muchos

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // ! relacion polimorfica uno a uno

    public function resource()
    {
        return $this->morphOne(Resource::class,'resourceable');
    }

    // ! relacion polimorfica uno a muchos

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
