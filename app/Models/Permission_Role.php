<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'permission_id'
    ];

    //Relacion 1 a 1
    // public function role()
    // {
    //     return $this->hasOne(Role::class);
    // }

    // //Relacion 1 a 1
    // public function permmision()
    // {
    //     return $this->hasOne(Permission::class);
    // }
}
