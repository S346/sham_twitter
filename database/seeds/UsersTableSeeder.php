<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $faker = Faker::create('en_US');

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => $faker->password(),
                'description' => $faker->sentence(),
            ]);
        }
    }
}
