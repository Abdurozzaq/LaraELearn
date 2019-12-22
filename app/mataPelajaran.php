<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mataPelajaran extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_mapel',
    ];

    /**
     * This is For CRUD
     * Mengkaitkan table mata_pelajaran
     *
     */
    protected $table = 'mata_pelajaran';

    /**
     * Kelas belongs to Mata Pelajaran - Relationship
     *
     */
    public function kelas()
    {
        return $this
            ->belongsToMany('App\kelas')
            ->withTimestamps();
    }

    /**
     * mataPelajaran belongs to User - Relationship
     *
     */
    public function userMapel()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}
