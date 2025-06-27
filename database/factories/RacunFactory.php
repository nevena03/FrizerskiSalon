<?php

namespace Database\Factories;

use App\Models\Racun;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RacunFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Racun::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ukupna_cena' => $this->faker->randomNumber(1),
            'nacin_placanja' => $this->faker->randomElement(['Gotovina','Kartica']),
            'datum_izdavanja' => $this->faker->date(),
            'termin_id' => \App\Models\Termin::factory(),
        ];
    }
}
