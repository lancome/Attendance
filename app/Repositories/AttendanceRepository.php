<?php

namespace App\Repositories;

use App\Attendance;
use App\Http\Requests\AttendanceRequest;

class AttendanceRepository implements IAttendanceRepository
{
    public function all()
    {
        return Attendance::all();
    }

    public function findAttendanceById($id)
    {
        return Attendance::find($id);
    }

    public function findAttendanceByStudent($id)
    {
        return Attendance::where('student_id','=', $id)->get();
//        return Group::get(array('code')) === $code;
    }

    public function add(Attendance $attendance)
    {
        $arr = array(
            'student_id'=>$attendance->student_id,
            'pivot_id'=>$attendance->pivot_id,
            'att_date'=>$attendance->att_date,
            'is_was'=>$attendance->is_was,
        );
        Attendance::create($arr);
    }

    public function remove($id)
    {
        Attendance::destroy($id);
    }

    public function update($id, array $post_data)
    {
        Attendance::find($id)->update($post_data);
    }
}