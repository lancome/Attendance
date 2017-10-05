@extends('layouts.app')
@section('content')
    <h1>Edit: {{$student->name}} {{$student->lastname}}</h1>
    <hr>
    {!! Form::model($student, ['method' => 'PATCH', 'action' => ['Admin\StudentController@update', $student->id]]) !!}
    @include('admin.students._form')
    <div class="form-group">
        {!! Form::submit('Edit student', ['class' => 'btn btn-xs btn-primary']) !!}
        <a href="{{url('students')}}" class="btn btn-xs btn-primary">Back</a>
    </div>
    {!! Form::close() !!}
@stop