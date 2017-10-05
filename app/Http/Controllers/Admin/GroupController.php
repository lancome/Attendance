<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use App\Repositories\IGroupRepository;

use App\Http\Requests;use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    protected $group;

    public function __construct(IGroupRepository $group)
    {
        $this->group = $group;
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
//        $group = Group::all();

//        $data = [
//            'group' => $this->group->all()
//        ];

//        $data = ['group' => $this->group->findGroupByCode('RDIR51')];

        $group = $this->group->all();
//        $group = $this->group->findGroupByCode('RDIR51');

        return view('admin.groups.index', compact('group'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.groups.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->groups()->create($request->all());
        return redirect('groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = $this->group->all();
//        $students = Group::findOrFail($id)->students()->get();
        return view('admin.groups.show', compact('students','group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->group->findGroup($id);
        return view('admin.groups.edit', compact('group'));

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
        $this->group->update($id,$request->all());
        return redirect('groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $g = $this->group->findGroup($id);
        $g->students()->delete();
        $g->delete();
        return redirect('groups');
    }
}
