<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];

    public function posts(){
        return $this->hasMany(Posts::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }

}
