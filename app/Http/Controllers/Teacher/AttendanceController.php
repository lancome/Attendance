<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Pivot;
use App\Repositories\IAttendanceRepository;
use App\Attendance;
use App\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\AttendanceRequest;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Symfony\Component\Yaml\Tests\A;

class AttendanceController extends Controller
{

    private $attendance;

    public function __construct(IAttendanceRepository $attendance)
    {
        $this->attendance = $attendance;
        $this->middleware('auth');
        $this->middleware('teacher');
    }

    public function index($pivotId,$studentId)
    {
//        if(Pivot::find($pivotId)->user_id==Auth::user()->id) {
            $was = 0;
            $attendances = Student::findOrFail($studentId)->attendances()->where('pivot_id',$pivotId)->get();
            foreach ($attendances as $attendance) {
                if ($attendance->is_was == true) {
                    $was++;
                }
            }
            $att_all = count($attendances);
            $att = $was / $att_all * 100;
            return view('teacher.attendances.index',
                compact('attendances', 'pivotId', 'studentId', 'att'));
//        }
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendance = $this->attendance->all();
        return view('teacher.attendances.create', compact('attendance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($pivotId,$studentId,Request $request)
    {
        $id = Input::get('att');
        Attendance::findOrFail($id)->isWas();
        return redirect('pivots/'. $pivotId .'/students/'. $studentId. '/attendances');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
