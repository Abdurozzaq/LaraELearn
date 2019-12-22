<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /*
     * User & Role Relationship
     * 
     */
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}
