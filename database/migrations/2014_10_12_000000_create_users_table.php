<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            //$table->string('email')->unique();
            $table->string('email', 128)->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->integer('group_id')->default(-1);
            $table->string('temppass')->nullable();
            $table->string('secure_code')->nullable();
            $table->string('access')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('active')->default(false);
            $table->boolean('online')->default(false);
            $table->timestamp('online_at')->nullable();
            $table->timestamp('offline_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
