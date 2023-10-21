<?php

namespace Database\Factories;

use App\Models\tienda;
use Illuminate\Database\Eloquent\Factories\Factory;

class tiendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tienda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'categoria' => $this->faker->randomDigitNotNull
        ];
    }
}
