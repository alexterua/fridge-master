<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Block;
use App\Models\Location;
use App\Models\Premis;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $locations = [
            'Wilmington (North Carolina)',
            'Portland (Oregon)',
            'Toronto',
            'Warsaw',
            'Valencia',
            'Shanghai',
        ];

        foreach ($locations as $location) {
            Location::factory()->create(
                [
                    'name' => $location,
                ],
            );
        }

        Premis::factory(10)->create();
        Block::factory(20)->create();
    }
}
