<?php

use Illuminate\Database\Seeder;
use App\Models\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        return User::create([
             'name' => 'Default Admin',
             'group_id' => 1,
             'email' => 'default@admin.com',
             'phone' => 8888881235,
             'password' => bcrypt('admin'), // secret
             'remember_token' => str_random(10),
         ]);
    }
}
