<?php

namespace Database\Factories;

use App\Models\CarModel;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model_id' => DB::table('car_models')
                ->inRandomOrder()
                ->first()->id,
            'number' => sprintf('%s%03d%s%02d',
                $this->faker->randomElement(['A', 'B', 'E', 'K', 'M', 'H', 'O', 'P', 'T', 'Y', 'X']),
                $this->faker->numberBetween(1, 999),
                implode('', $this->faker->randomElements(['A', 'B', 'E', 'K', 'M', 'H', 'O', 'P', 'T', 'Y', 'X'], 2)),
                $this->faker->numberBetween(0, 99),
            )
        ];

    }
}
