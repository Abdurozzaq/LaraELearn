<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nisn', 50)->nullable()->unique();
            $table->string('nip', 50)->nullable();
            $table->string('name')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('kelas')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('bulan_lahir')->nullable();
            $table->string('tahun_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->integer('tahun_masuk')->nullable();
            $table->string('no_telp', 16)->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
