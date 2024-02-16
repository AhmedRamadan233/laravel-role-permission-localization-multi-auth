<?php

// namespace App\Models;

// use App\Traits\HasRoles;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

// class Admin extends Authenticatable
// {
//     use HasApiTokens, HasFactory, Notifiable , HasRoles;

//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//         'phone'
//     ];

//     protected $hidden = [
//         'password',
//         'remember_token',
//     ];

//     protected $casts = [
//         'email_verified_at' => 'datetime',
//     ];

//     protected $guard = 'admin';


//     // public function roles()
//     // {
//     //     return $this->morphToMany(Role::class, 'authorizable');
//     // }

// }
