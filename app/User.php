<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function attendances()
    {
        return $this->hasManyThrough('App\Attendance','App\Pivot','user_id','pivot_id','id');
    }
    public function attendance()
    {
        return $this->belongsToMany('App\Attendance','App\Pivot','user_id','pivot_id','id');
    }
    public function subjects()
    {
        return $this->belongsToMany('App\Subject','pivots','user_id','subject_id','id');
    }
    public function groups()
    {
        return $this->belongsToMany('App\Group','pivots','user_id','group_id','id');
    }
    
    public function role()
    {
        return $this->hasOne('App\Role','id','role_id');
    }

    public function pivots()
    {
        return $this->hasMany('App\Pivot');
    }
}