<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name'     => "Admin",
            'email'=> 'admin@admin.com',
            'password' => hash::make('password'),
            'created_at'=>date('y-m-d h:i:s'),
            'updated_at'=>date('y-m-d h:i:s'),
        ]);
    }
}
