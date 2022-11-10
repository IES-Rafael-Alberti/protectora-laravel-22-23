<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mascota;
use App\Models\Foto_Mascota;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mascota = Mascota::factory()->create();
        Foto_Mascota::factory(3)->for($mascota)->create();
        Mascota::factory()->has(Foto_Mascota::factory(5), 'fotos')->create();
    }
}
