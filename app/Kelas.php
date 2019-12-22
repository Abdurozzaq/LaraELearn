<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_kelas', 'deskripsi',
    ];

    /**
     * This is For CRUD
     * Mengkaitkan table kelas
     *
     */
    protected $table = 'kelas';

    /**
     * Kelas belongs to Mata Pelajaran - Relationship
     *
     */
    public function mapel()
    {
        return $this
            ->belongsToMany('App\mataPelajaran')
            ->withTimestamps();
    }
}
