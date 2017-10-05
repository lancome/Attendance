<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\IStudentRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    protected $student;

    public function __construct(IStudentRepository $student)
    {
        $this->student = $student;
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
//        $student = Student::all();
//        dd(DB::table('groups')->where('code', '=', 1)->first());
//dd(Student::where('group_code', '=', Group::where('code', '=', 'RDIR51')->firstOrFail()->id)->get());
//dd(Group::where('code', '=', 'RDIR51')->firstOrFail()->id);
//        dd(Student::where('group_code',
//    '=',
//    Group::where('code', '=', 'RDIR51')->firstOrFail()->id)->firstOrFail()->id);
        
        $student = $this->student->all();
        return view('admin.students.index', compact('student'));
    }
    
    public function create()
    {
        return view('admin.student.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect('students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->student->findStudent($id);
//dd(Student::findOrFail($id));
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->student->findStudent($id);
        return view('admin.students.edit', compact('student'));
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
        $this->student->update($id,$request->all());
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = $this->student->findStudent($id);
        $s->attendances()->delete();
        $s->delete();
        return redirect('students');
    }
}
