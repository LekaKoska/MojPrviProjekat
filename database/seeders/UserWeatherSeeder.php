<?php

namespace Database\Seeders;

use App\Models\User;
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
            return;
        }
        $temperature = $this->command->getOutput()->ask("Unesite temperaturu");
        if($temperature === null)
        {
            $this->command->getOutput()->error("Morate uneti temperaturu!");
            return;
        }

       $cityExist = WeatherModel::where(["name" => $city])->first();

        if($cityExist instanceof WeatherModel)
        {
            $this->command->getOutput()->error("Ovaj grad vec postoji");
            return;
        }

        WeatherModel::create([
            'name' => $city,
            'temperature' => $temperature
        ]);

        $this->command->getOutput()->info("Uspesno ste uneli grad $city sa temperatorom $temperature ");


    }
}
