<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = user::create([
            'name'=> 'Carlos Navia Gonzalez',
            'email'=>'cjnavia@hotmail.com',
            'password'=>bcrypt('12345678')
        ]);

        // $user->roles()->attach(); De esta forma se haria con el ID, de la forma assignRole lo hara por el nombre
        $user->assignRole('Admin');

        User::factory(99)->create();
    }

}
