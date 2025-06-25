<?php

namespace Database\Factories;

use App\Models\Usluga;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UslugaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usluga::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naziv' => $this->faker->unique->text(255),
            'cena' => $this->faker->randomNumber(1),
            'administrator_id' => \App\Models\User::factory(),
        ];
    }
}
