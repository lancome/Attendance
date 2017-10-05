<?php

namespace App\Http\Controllers\Teacher;

use App\Attendance;
use App\Group;
use App\Http\Controllers\Controller;
use App\Pivot;
use App\Student;
use App\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Symfony\Component\Yaml\Tests\A;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }

    public function index($pivotId)
    {
        $students = Pivot::findOrFail($pivotId)->group->students;
//        $attend = collect();
//        foreach ($students as $student1) {
//            $attend->push($student1->attendances->where('att_date', Carbon::create(2016,5,17,0,0,0)->toDateTimeString()));
//        }
//        $att = $attend->flatten();
//        dd($att2);

        return view('teacher.students.index', compact('students', 'pivotId'));
    }


    public function create($pivotId)
    {
        //
    }

    public function store($pivotId, Request $request)
    {
//        dd(Carbon::now()->toDateString());
//        $id = Carbon::parse(Input::get('att_date'));
//
//        dd($id);
//
//        if ($id == Carbon::now()->toDateString()) {
//            dd(1);
//        }
//        else dd(2);

        foreach (Pivot::findOrFail($pivotId)->group->students as $student) {
            $at = new Attendance();
            $at->student_id = $student->id;
            $at->pivot_id = $pivotId;
            $at->description = Input::get('desc');
            $at->att_date = Input::get('att_date');
            $at->save();
        }

        return redirect()->back();
    }

    public function show($id,$students)
    {

//        foreach (Group::where('id','=',$students)->get() as $item) {
//            if (Auth::user()->id == Group::findOrFail($students)->userpivot->user_id) {
//                $student = $item->students;
//            }
//        }
//        return view('teacher.students.show', compact('student'));

//        ----------------

    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

    }
}
