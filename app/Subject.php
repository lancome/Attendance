<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'subject_code',
        'semester',
        'language'
    ];

    public function userpivot()
    {
        return $this->hasOne('App\Pivot','subject_id','id');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group','pivots'
            ,'subject_id','group_id','id');
    }

}
