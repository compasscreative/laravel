<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title')->default('');
            $table->string('bio')->default('');
            $table->string('phone')->default('');
            $table->string('email')->default('');
            $table->string('password')->default('');
            $table->string('remember_token', 100)->nullable();
            $table->boolean('is_admin')->default('0');
            $table->boolean('display_on_team')->default('0');
            $table->integer('team_display_order')->nullable();
            $table->string('photo_filename')->default('');
            $table->string('slug');
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
        Schema::drop('users');
    }
}
