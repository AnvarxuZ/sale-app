<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'Германия', 'code' => 'DE', 'tax_percent' => 19],
            ['name' => 'Италия', 'code' => 'IT', 'tax_percent' => 22],
            ['name' => 'Греция', 'code' => 'GR', 'tax_percent' => 24],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
