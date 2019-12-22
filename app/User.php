<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nisn',
        'nip',
        'name',
        'username',
        'email',
        'kelas',
        'jabatan',
        'tempat_lahir',
        'tgl_lahir',
        'bulan_lahir',
        'tahun_lahir',
        'jenis_kelamin',
        'agama',
        'tahun_masuk',
        'no_telp',
        'avatara',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * Role & User Relationship
     *
     */
    public function roles()
    {
        return $this
            ->belongsToMany('App\Role')
            ->withTimestamps();
    }

    /*
     * This is For Checking Role
     *
     */
    public function authorizeRoles($roles)
    {
    if ($this->hasAnyRole($roles)) {
        return true;
    }
    abort(401, 'This action is unauthorized.');
    }


    public function hasAnyRole($roles)
    {
    if (is_array($roles)) {
        foreach ($roles as $role) {
        if ($this->hasRole($role)) {
            return true;
        }
        }
    } else {
        if ($this->hasRole($roles)) {
        return true;
        }
    }
    return false;
    }


    public function hasRole($role)
    {
    if ($this->roles()->where('name', $role)->first()) {
        return true;
    }
    return false;
    }

   /*
    * This is For CRUD
    *
    */
    protected $table = 'users';

    /**
     * User & Mapel Relationship
     *
     */
    public function mapelUser()
    {
        return $this
            ->belongsToMany('App\mataPelajaran')
            ->withTimestamps();
    }
}
