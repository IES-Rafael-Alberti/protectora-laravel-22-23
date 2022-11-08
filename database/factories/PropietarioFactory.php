<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propietario>
 */
class PropietarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        #$imagen = Storage::put("propietarios", file_get_contents(fake()->imageUrl(360, 360)));
        return [
            'nombre' => fake("es_ES")->firstName(),
            'apellidos' => fake("es_ES")->lastName(),
            'rutafoto' => fake()->imageUrl(360, 360)
        ];
    }
}
