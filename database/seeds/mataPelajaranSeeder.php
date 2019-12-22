<?php

use Illuminate\Database\Seeder;

class mataPelajaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Mapel PBO
         *
         */
        DB::table('mata_pelajaran')->insert([
            'id' => '1',
            'nama_mapel' => 'Pemprograman Berorientasi Objek',
        ]);

        /**
         * Mapel Matematika
         *
         */
        DB::table('mata_pelajaran')->insert([
            'id' => '2',
            'nama_mapel' => 'Matematika',
        ]);
    }
}
