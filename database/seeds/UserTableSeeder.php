<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     *
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_US');
        for($i=0; $i<100; $i++){
            App\User::create([
               'name'=>$faker->name,
               'email'=> $faker->email,
               'password'=>Hash::make('1234'.$faker->name),
               'phone_number'=>0,
               'user_type'=>'employer'

            ]);
        }
    }
}
