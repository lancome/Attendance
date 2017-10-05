@extends('layouts.app')

@section('content')
    <h1>Write a new Attendance</h1>
    <hr>
    {!! Form::open(['url' => 'attendance/']) !!}
    @include('teacher.attendances._form')
    <div class="form-group">
        {!! Form::submit('Add Attendance', ['class' => 'btn btn-primary']) !!}
        <a href="{{url('articles/')}}" class="btn btn-primary">Back</a>
    </div>
    {!! Form::close() !!}
@stop