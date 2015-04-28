<?php

class AdminSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{    DB::table('users')->delete();
		 User::create(array(
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'contact' => '9766853169',
            'password' => Hash::make('admin'),
            'status' => 1,
            'dob'=>'01/12/1988',
            'remember_token'=>Hash::make(date("Yhmids") . uniqid())
        ));
	}

}
