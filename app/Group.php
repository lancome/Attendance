<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'code',
    ];

    public function students()
    {
        return $this->hasMany('App\Student','group_code','id');
    }

    public function userpivot()
    {
        return $this->hasOne('App\Pivot','group_id','id');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject','pivots'
            ,'group_id','subject_id','id');
    }
    public function subjectpivot()
    {
        return $this->hasOne('App\Pivot','user_id','id');
    }

}
