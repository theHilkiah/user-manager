<?php

namespace Admin\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('groups')->insert([
            [
               "label" => "Vendor",
               "group_id" => 0,
               'desc' => 'This an external Vendor',
               "permissions" => [""],
            ],
            [
               "label" => "Admin",
               "group_id" => 1,
               'desc' => 'This is the super Admin group',
               "permissions" => [""],
            ],
            [
               "label" => "Member",
               "group_id" => 2,
               'desc' => 'This an employees group',
               "permissions" => [""],
            ]
        ]);
    }
}
