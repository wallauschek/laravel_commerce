<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create(
        	[
		        'name' => 'wallauschek',
		        'email' => 'pedro@pedrowallauschek.com.br',
		        'password' => Hash::make(123456),
		        'remember_token' => str_random(10),
		    ]
        );

        factory('CodeCommerce\User', 10)->create();

    }
}
