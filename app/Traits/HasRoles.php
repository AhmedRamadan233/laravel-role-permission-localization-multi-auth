<?php

namespace App\Traits;
use App\Models\Role;

trait HasRoles
{


    public function hasAbility($ability)
    {
        $denied = $this->roles()->whereHas('abilities', function ($query) use ($ability) {
            $query->where('ability', $ability)
                  ->where('type', '=', 'deny');
        })->exists();

        if ($denied) {
            return false;
        }

        return $this->roles()->whereHas('abilities', function ($query) use ($ability) {
            $query->where('ability', $ability)
                  ->where('type', '=', 'allow');
        })->exists();
    }
}