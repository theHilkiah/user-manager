<?php

use Illuminate\Database\Seeder;

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
        return \DB::table('users')->insert([
             [
                 'name' => 'Default Admin',
                 'group_id' => 1,
                 'email' => 'default@admin.com',
                 'phone' => '987 654 3210',
                 'password' => bcrypt('admin'), // secret
                 'remember_token' => str_random(10),
             ],
             [
                 'name' => 'Default User',
                 'group_id' => 0,
                 'email' => 'default@user.com',
                 'phone' => '123 456 7890',
                 'password' => bcrypt('secret'), // secret
                 'remember_token' => str_random(10),
             ]
         ]);
    }
}
