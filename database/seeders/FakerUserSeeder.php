<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class FakerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = $this->command->getOutput()->ask("Koji email zelite da stavite?");
        if($email === null)
        {
            $this->command->getOutput()->error("Morate uneti email");
        }
        $name = $this->command->getOutput()->ask("koje ime zelite da stavite?");
        if($name === null)
        {
            $this->command->getOutput()->error("Morate uneti ime");
        }
        $password = $this->command->getOutput()->ask("Koju lozinku zelite da stavite?");

        $emailExist = User::where(['email' => $email])->first();
        if($emailExist instanceof User)
        {
            $this->command->getOutput()->error("Ovaj korisnik vec postoji");
            return;
        }



        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $this->command->getOutput()->info("Uspesno ste uneli korisnika $name ");
    }
}
