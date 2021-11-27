<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index){
            DB::table('users')->insert([
                'login'=>$faker->userName,
                'password'=>bcrypt('user'),
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'email'=>$faker->email,
                'phone'=>$faker->e164PhoneNumber,
                'type'=>$faker->randomElement($array = array ('Particulier','Professionnel')),
                'sexe'=>$faker->randomElement($array = array ('Homme','Femme')),
                'adress'=>$faker->streetName,
                'city'=>$faker->city,
                'zipcode'=>$faker->postcode,
                'country'=>$faker->randomElement($array = array ('Luxembourg','Belgique')),
                'is_admin'=>$faker->boolean,
            ]);
        }
    }
}
