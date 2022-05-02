<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'juanjo',
            'email' => 'juanjosr98@gmail.com',
            'password' => bcrypt('2.714462')
        ]);

        /* metodo 1 */
        /* $user->roles()->attach(2); */

        /* metodo con laravel permission */
        $user->assignRole('Admin');

        User::factory(99)->create();//Llamo al factory y lo ejecuto 10 veces
    }
}
