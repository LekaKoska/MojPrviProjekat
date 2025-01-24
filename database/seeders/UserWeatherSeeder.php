<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $city = $this->command->getOutput()->ask("Koji grad zelite da unesete?");


        if($city === null)
        {
            $this->command->getOutput()->error("Morate uneti grad!");
        }
        $temperature = $this->command->getOutput()->ask("Unesite temperaturu");
        if($temperature === null)
        {
            $this->command->getOutput()->error("Morate uneti temperaturu!");
        }

        WeatherModel::create([
            'name' => $city,
            'temperature' => $temperature
        ]);


    }
}
