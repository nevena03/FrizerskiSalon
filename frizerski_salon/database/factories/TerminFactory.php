<?php

namespace Database\Factories;

use App\Models\Termin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Termin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datum' => $this->faker->date(),
            'vreme' => $this->faker->time(),
            'status' => '',
            'frizer_id' => \App\Models\User::factory(),
            'klijent_id' => \App\Models\User::factory(),
        ];
    }
}
