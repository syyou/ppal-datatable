<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /*
     * Medium RoleAuth_201
     * User Role base auth native
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
