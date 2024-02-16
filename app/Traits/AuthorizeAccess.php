<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthorizeAccess
{
    protected function authorizeAccess($ability)
    {
        $user = Auth::user();

        if (!$user || !$user->hasAbility($ability)) {
            abort(403, 'Unauthorized action.');
        }
    }
}
