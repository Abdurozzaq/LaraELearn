<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Okemin',
            'username' => 'Okemin',
            'email' => 'okemin@example.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Teacher',
            'username' => 'Teacher',
            'email' => 'Teacher@example.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Student',
            'kelas' => 'XI RPL 1',
            'tahun_masuk' => '2003',
            'username' => 'Student',
            'email' => 'Student@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
