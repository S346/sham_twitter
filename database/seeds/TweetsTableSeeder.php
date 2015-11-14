<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\User;
use App\Tweet;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tweets')->delete();

        $users = User::all();
        $faker = Faker::create('en_US');

        foreach ($users as $user) {
            for ($j = 0; $j < 10; $j++) {
                $tweet = new Tweet([
                    'body' => $faker->sentence(),
                    'published_at' => $faker->dateTime(),
                ]);
                $user->tweets()->save($tweet);
            }
        }
    }
}
