<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // url amigables

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // asignacion masiva

    protected $guarded = ['id','status'];


    // variable para encontrar el numero de veces que se repite un registro en otra tabla ej: Numero de estudiantes matriculados en un curso
    
    protected $withCount = ['students','reviews'];

    // query scopes

    public function scopeCategory($query,$category_id)
    {
        if ($category_id) {
            return $query->where('category_id',$category_id);
        }
    }

    public function scopeLevel($query,$level_id)
    {
        if ($level_id) {
            return $query->where('level_id',$level_id);
        }
    }

    // agregamos un nuevo atributo para la calificacion de un curso

    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'),1);        
        }else{
            return 5;
        }
    }

    // ? relacion uno a muchos inversa

    public function teacher()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    // ? relacion muchos a muchos inversa

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    // ? relacion uno a muchos 

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // ? relacion uno a muchos inversa

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // ? relacion uno a muchos inversa
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ? relacion uno a muchos inversa

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    // ? relacion uno a muchos

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    // ? relacion uno a muchos

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    // ? relacion uno a muchos

    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    // ? relacion uno a muchos

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    // ! relacion uno a uno polimorfica

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    // ! relacion uno a muchos a traves de

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class,Section::class);
    }
}
