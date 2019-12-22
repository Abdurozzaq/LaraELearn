<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('KelasTableSeeder');
        $this->call('mataPelajaranTableSeeder');
        $this->call('MateriTableSeeder');
        $this->call('ExerciseTableSeeder');
    }
}
