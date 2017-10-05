<?php

namespace App\Http\Controllers\Teacher;

use App\Group;
use App\Http\Controllers\Controller;
use App\Pivot;
use App\Repositories\ISubjectRepository;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }

//    public function groups($id)
//    {
//        
//    }

    public function index()
    {
        $subject = collect();
        $a = Pivot::where('user_id','=',Auth::user()->id)->get()->groupBy('subject_id');
        foreach ($a as $item => $value)
        {
            $subject->push(Subject::where('id','=',$item)->first());
        }
//        dd($subject);
        return view('teacher.subjects.index', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        foreach (Subject::where('id', '=', $id)->get() as $item) {
            if (Auth::user()->id == Subject::findOrFail($id)->userpivot->user_id) {
                $subject = $item->groups;
            }
        }
        $subjectid = $id;
        return view('teacher.subjects.show', compact('subject','subjectid'));

        
        
//        $subject = Subject::findOrFail($id);
//        if(Subject::findOrFail($id)->users->user_id==Auth::user()->id)
//        {
//            $subject = Subject::findOrFail($id);
//            return view('teacher.subjects.show', compact('subject'));
//        }
//        return redirect('your_subjects');
//        $subject = Subject::findOrFail($id)->where(Subject::findOrFail($id)->users->user_id,'=', Auth::user()->id);
//dd(Subject::findOrFail($id)->users->user_id);
//dd( Auth::user()->id);
//        return view('teacher.subjects.show', compact('subject'));
        
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
        $s = Pivot::where('subject_id','=',$id);
        $s->delete();
        return redirect('your_subjects');
    }
}
