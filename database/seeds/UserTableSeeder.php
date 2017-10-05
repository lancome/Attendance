<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'name' => 'teacher',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => '2',
            'password' => bcrypt('123123'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user@gmail.com',
            'password' => bcrypt('qweqwe'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('qweqwe'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

    }
}
