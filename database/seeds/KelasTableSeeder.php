<?php

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'id' => '1',
            'nama_kelas' => 'XI RPL 1',
            'deskripsi' => 'Kelas 11 Rekayasa Perangkat Lunak 1',
        ]);

        DB::table('kelas')->insert([
            'id' => '2',
            'nama_kelas' => 'XI RPL 2',
            'deskripsi' => 'Kelas 11 Rekayasa Perangkat Lunak 2',
        ]);

        DB::table('kelas')->insert([
            'id' => '3',
            'nama_kelas' => 'XI RPL 3',
            'deskripsi' => 'Kelas 11 Rekayasa Perangkat Lunak 3',
        ]);
    }
}

?>
