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
		Schema::create('users', function(Blueprint $table)
    {
        $table->increments('id');
        $table->string('name');
        $table->string('contact');
        $table->string('role');
        $table->string('dob');
        $table->string('email')->unique();
        $table->string('password');
        $table->integer('status');
        $table->string('remember_token');
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
		//
	}

}
