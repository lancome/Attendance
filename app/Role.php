<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function isAdmin()
    {
        return $this->name === "admin";
    }
    public function isTeacher()
    {
        return $this->name === "teacher";
    }
}
