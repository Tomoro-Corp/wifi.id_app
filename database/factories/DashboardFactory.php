<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dashboard>
 */
class DashboardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'apmac' => $this->faker->randomNumber(),
            'apsn' => $this->faker->name(),
            'aptype' => $this->faker->mimeType(),
            'apname' => $this->faker->name(),
            'location' => $this->faker->address(),
            'witel' => $this->faker->state(),
            'tanggal' => $this->faker->date(),
        ];
    }
}
