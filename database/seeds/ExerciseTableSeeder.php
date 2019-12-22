<?php

use Illuminate\Database\Seeder;

class ExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercise')->insert([
            'id' => '1',
            'mapel' => 'Pemprograman Berorientasi Objek',
            'kelas' => 'XI RPL 1',
            'nama_exercise' => 'Tipe Data',
            'deskripsi' => 'HAYO EXERCISE NIH! ^o^',
            'user_id_teacher' => '2',
        ]);
    }
}
