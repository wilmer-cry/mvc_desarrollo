<?php

namespace Database\Factories;

use App\Models\analisis;
use Illuminate\Database\Eloquent\Factories\Factory;

class analisisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = analisis::class;

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
