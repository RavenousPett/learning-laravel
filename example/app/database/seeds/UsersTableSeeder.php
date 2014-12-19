<?php

class UsersTableSeeder extends Seeder{

	public function run(){

		User::truncate();

		User::create([
			'username' => 'JeffereyWay',
			'email'    => 'jeff@laracasts.com',
			'password' => '1234'
		]);

		User::create([
			'username' => 'AliWay',
			'email'    => 'ali@laracasts.com',
			'password' => '1234'
		]);

	}

}