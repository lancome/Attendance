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

class PivotController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }

    public function index()
    {
//        $subjects = collect();
        $pivots=Auth::user()->pivots;
//        foreach ($pivots as $item) {
//            $subjects->push($item->subject);
//        }
//        dd($subjects);
        return view('teacher.pivots.index', compact('pivots'));
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

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
//        $pivots = Pivot::findOrFail($id)->groups;
//        return view('teacher.pivots.show', compact('pivots'));

        
        
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
        $s = Pivot::findOrFail($id);
        $s->delete();
        return redirect('subjects');
    }
}
