<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;  // Šī rinda bija aizmirsta

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Izveidojam 5 valstis ar unikāliem nosaukumiem un datiem
        $countries = Country::factory()
            ->count(5)
            ->create();

        // Izveidojam 20 pilsētas, katrai piesaistot kādu no izveidotajām valstīm
        City::factory()
            ->count(20)
            ->make()
            ->each(function ($city) use ($countries) {
                $city->country_id = $countries->random()->id;
                $city->save();
            });
    }
}
