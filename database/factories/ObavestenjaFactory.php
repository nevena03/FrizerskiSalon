<?php

namespace Database\Factories;

use App\Models\Obavestenja;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObavestenjaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Obavestenja::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'poruka' => $this->faker->text(255),
            'datum' => $this->faker->dateTime(),
            'termin_id' => \App\Models\Termin::factory(),
        ];
    }
}
