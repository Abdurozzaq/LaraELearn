<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Admin / Okemin
         *
         */
        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1',
        ]);

        /**
         * Teacher
         *
         */
        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_id' => '2',
        ]);

        /**
         * Student
         *
         */
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '3',
        ]);
    }
}
