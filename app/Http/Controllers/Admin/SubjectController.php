<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ISubjectRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubjectController extends Controller
{

    private $subject;
    public function __construct(ISubjectRepository $subject)
    {
        $this->subject = $subject;
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $subject = $this->subject->all();
        return view('admin.subjects.index', compact('subject'));
    }

    public function create()
    {
        return view('admin.subjects.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        Auth::user()->subjects()->create($request->all());
        return redirect('subjects');
    }

    public function show($id)
    {
        $subject = $this->subject->findSubject($id);
        return view('admin.subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        $subject = $this->subject->findSubject($id);
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $this->subject->update($id,$request->all());
        return redirect('subjects');
    }

    public function destroy($id)
    {
        $s = $this->subject->findSubject($id);
        $s->delete();
        return redirect('subjects');
    }
}
