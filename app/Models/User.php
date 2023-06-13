<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fio',
        'email',
        'password',
        'role_id'
    ];
    // protected $attributes = [
    //     'role_id' => 1,
    // ];

    public $timestamps = true;

    public function role()
    {
        return $this->hasOne(Role::class, 'role_id');
    }
}
