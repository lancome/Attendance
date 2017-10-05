<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pivot extends Model
{
    protected $fillable = [
        'user_id',
        'subject_id',
        'group_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function subject()
    {
        return $this->belongsTo('App\Subject','subject_id','id');
    }
    public function subjects()
    {
        return $this->belongsToMany('App\Subject','pivots','subject_id','id');
    }
    public function group()
    {
        return $this->belongsTo('App\Group','group_id','id');
    }
    public function groups()
    {
        return $this->hasMany('App\Group','id','group_id');
    }
    public function attendance()
    {
        return $this->hasMany('App\Attendance','pivot_id','id');
    }
    public function students()
    {
        return $this->belongsToMany('App\Students','groups','group_id','');
    }
}
