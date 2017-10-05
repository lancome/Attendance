<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'student_code',
        'group_code'
    ];
    
    public function group()
    {
        return $this->hasOne('App\Group','id','group_code');
    }
    public function attendances()
    {
        return $this->hasMany('App\Attendance','student_id','id');
    }
    public function attendance()
    {
        return $this->hasMany('App\Attendance','student_id','id');
    }
    public function oneattendance()
    {
        return $this->hasOne('App\Attendance','student_id','id');
    }
}
