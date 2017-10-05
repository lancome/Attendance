<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;


class Attendance extends Model
{
    protected $fillable = [
        'pivot_id',
        'student_id',
        'description',
        'is_was',
        'att_date'
];

    public function isWas()
    {
        $this->is_was = $this->is_was ? false : true;
        $this->save();
    }

    public function setAttDateAttribute($date)
    {
//        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['att_date'] = Carbon::parse($date);

//        if(Input::get('att_date') > Carbon::now())
//        {
//            $this->attributes['att_date'] = Carbon::parse($date);
//        }
//        else
//        {
//            $this->attributes['att_date'] = Carbon::createFromFormat('Y-m-d',$date);
//        }
    }
    public function student()
    {
        return $this->belongsTo('App\Student','student_id','id');
    }

    public function pivot()
    {
        return $this->belongsTo('App\Pivot','pivot_id','id');
    }
}
