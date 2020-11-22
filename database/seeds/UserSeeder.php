<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userNames = [
            "admin","member"
        ];

        $userEmails = [
            "admin@gmail.com","member@gmail.com"
        ];

        $userPasswords = [
            "admin1","member1"
        ];

        for ($i=0; $i < 2; $i++) { 
            $user = new User;
            $user->fill(["name" => $userNames[$i], "email" => $userEmails[$i],"password" => bcrypt($userPasswords[$i])]);
            $user->save();
        }
    }
}