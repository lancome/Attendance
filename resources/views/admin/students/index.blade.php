@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Students</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel-body">
                    <table class="table table-hover">
                            <tbody>
                            @foreach($student as $item)
                            <tr>
                                <td><a href="{{ url('/students', $item->id) }}">{{$item->lastname}}</a></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->student_code}}</td>
                                <td>{{$item->group->code}}</td>
                                {{ Form::open(array('url' => 'students/' . $item->id, 'class' => 'pull-right')) }}

                                <td>
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
                                    <a class="btn btn-xs btn-primary" href="{{ URL::to('students/' . $item->id . '/edit') }}">Edit</a>
                                </td>
                                {{ Form::close() }}
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                    {!! $student->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection