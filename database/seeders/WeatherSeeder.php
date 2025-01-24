<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create(); // Making faker

        $this->command->getOutput()->progressStart(5);

        for($i = 0; $i < 5; $i ++)
        {

            WeatherModel::create
            ([
                "name" => $faker->city,
                "temperature" => rand(10, 25)
            ]);

        }

        $this->command->getOutput()->progressAdvance();
        $this->command->getOutput()->progressFinish();



    }
}
