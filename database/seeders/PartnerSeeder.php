<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Partner;
use Faker\Factory as Faker;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Use Indonesian locale for realistic local names if preferred

        for ($i = 0; $i < 5; $i++) {
            Partner::create([
                'name' => $faker->company,
                'logo_url' => 'https://placehold.co/200x200?text=' . urlencode($faker->company),
            ]);
        }
    }
}
