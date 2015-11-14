<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Friend;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends')->delete();

        $users = User::all();
        $random = range(1, $users->count());

        foreach ($users as $user) {
            shuffle($random);
            for ($j = 0; $j < 5; $j++) {
                $friend = new Friend([
                    'friend_user_id' => $random[$j],
                ]);
                $user->friends()->save($friend);
            }
        }
    }
}
