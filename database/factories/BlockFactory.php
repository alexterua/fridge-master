<?php

namespace Database\Factories;

use App\Models\Premis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Block>
 */
class BlockFactory extends Factory
{
    public function definition()
    {
        return [
            'length' => 2,
            'width' => 1,
            'height' => 1,
            'is_free' => 1,
            'premis_id' => random_int(1, 10)
        ];
    }
}
