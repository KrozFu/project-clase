<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'url',
        'method'
    ];

    //Relacion n a n
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
