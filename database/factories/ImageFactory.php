<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //image(direccion donde quiero que se descargue la imagen)
        //true = public/storage/courses/imagen.jpg
        //false =  imagen.jpg
        // La manera que usamos siempre es false concatenado con la carpeta ej: 'courses/imagen.jpg'
        return [
            'url' => 'courses/'.$this->faker->image('public/storage/courses',640,480,null,false),
        ];
    }
}
