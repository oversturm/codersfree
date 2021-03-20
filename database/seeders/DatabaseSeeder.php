<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;//Importamos este metodo para generar carpetas

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Creando la carpeta para las imagenes, primero ejecutara la carpeta y luego los seeder;
        //Primero borrara la carpeta y despues la crearar mientrar desarrollamos para no llenarnos de imagenes
        Storage::deleteDirectory('cursos');
        Storage::makeDirectory('cursos');

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
    }
}
