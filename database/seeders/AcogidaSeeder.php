<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Propietario;
use App\Models\Mascota;
use App\Models\Acogida;

class AcogidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mascotaEjemplo = Mascota::All()->random();
        $propietarioEjemplo = Propietario::All()->random();
        Acogida::factory()
            ->for($mascotaEjemplo)
            ->for($propietarioEjemplo)
            ->create();
    }
}
