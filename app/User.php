<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * protected $guarded = [];
     * @var array
     */
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'email',
        'address',
        'zipcode',
        'state',
        'phone',
        'password',
        'consent',
        'status',
        'ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'consent',
        'status',
        'ip',
    ];

    /*
     * Medium RoleAuth_201
     * User Role base auth native
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    /*
     * Medium RoleAuth_201
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }


    /*
     * Medium RoleAuth_201
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }


    /*
     * Medium RoleAuth_201
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

}
