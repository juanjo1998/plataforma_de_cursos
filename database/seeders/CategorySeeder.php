<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'diseño web'
        ]);

        Category::create([
            'name' => 'desarrollo web'
        ]);

        Category::create([
            'name' => 'programacion'
        ]);
    }
}
