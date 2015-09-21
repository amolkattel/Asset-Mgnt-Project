<?php

namespace App;

trait HasRoles {


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
        
        // foreach ($role as $r) {
        //     if($this->hasRole($r->name)) {
        //         return true;
        //     }
        // }

        // return false;
    }
    
    /**
     * Assign role to user
     * @param  string $role role name
     * @return bool
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    /**
     * Revokes the given role from the user.
     *
     * @param  int $roleId
     * @return bool
     */
    public function revokeRole($roleId = '')
    {
        return $this->roles()->detach($roleId);
    }

    /**
     * Syncs the given role(s) with the user.
     *
     * @param  array $roleIds
     * @return bool
     */
    public function syncRoles(array $roleIds)
    {
        return $this->roles()->sync($roleIds);
    }

    /**
     * Revokes all roles from the user.
     *
     * @return bool
     */
    public function revokeAllRoles()
    {
        return $this->roles()->detach();
    }

}