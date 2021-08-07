<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Offerts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offertas')->truncate();
        DB::table('additives')->truncate();

        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('offertas')->insert(
                [
                    'panstwo' => $faker->state,
                    'miasto' => $faker->city,
                    'osoby' => $faker->numberBetween(1, 5),
                    'id_user' => $faker->numberBetween(1, 3),
                    'cena' => $faker->numberBetween(1000, 5000),
                    'opis' => $faker->catchPhrase,
                    'zdjecie' => $faker->imageUrl(),
                    'dostepnosc' => $faker->numberBetween(0, 1),
                    'id_additives' => $faker->numberBetween(1, 5),
                    'od' => $faker->dateTimeBetween(),
                    'do' => $faker->dateTimeBetween(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            );
        }

        for ($k = 0; $k < 5; $k++) {
            DB::table('additives')->insert([
                'nazwa' => $faker->colorName,
                'dostepnosc' => $faker->numberBetween(0, 1)
            ]);
        }
    }
}
