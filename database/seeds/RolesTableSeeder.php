<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'Admin',
            'description' => 'Admin Role (Okemin)',
        ]);

        DB::table('roles')->insert([
            'id' => '2',
            'name' => 'Teacher',
            'description' => 'Teacher Role',
        ]);

        DB::table('roles')->insert([
            'id' => '3',
            'name' => 'Student',
            'description' => 'Student Role',
        ]);
    }
}
