<?php

namespace Admin\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Admin\Users\Models\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Group::create([
            "label" => "Admin",
            "group_id" => 1,
            "permissions" => [""],
        ]);
    }
}
