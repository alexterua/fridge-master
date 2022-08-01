<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Premis>
 */
class PremisFactory extends Factory
{
    public function definition()
    {
        return [
            'temperature' => random_int(-24, -1),
            'location_id' => random_int(1, 6)
        ];
    }
}
