<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    // public function boot(): void
    // {
    //     $this->registerPolicies();
    
   
        
    //         foreach (config('abilities') as $permission => $label) {
    //             Gate::define($permission, function (User $user) use ($permission) {
    //                 return $user->hasAbility($permission);
    //             });
  
   
    //     // foreach(config('abilities') as $code => $lable ){
    //     //     Gate::define($code, function($user) use ($code){
    //     //         return $user->hasAbility($code);
    //     //     });
    //     // }
    // }

    public function boot()
    {
        $this->registerPolicies();

        foreach (config('abilities') as $permission => $label) {
            Gate::define($permission, function (User $user) use ($permission) {
                return $user->hasAbility($permission);
            });
        }
    }
}
