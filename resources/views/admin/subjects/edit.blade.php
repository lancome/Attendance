@extends('layouts.app')
@section('content')
    <h1>Edit: {{$subject->name}}</h1>
    <hr>
    {!! Form::model($subject, ['method' => 'PATCH', 'action' => ['Admin\SubjectController@update', $subject->id]]) !!}
    @include('admin.subjects._form')
    <div class="form-group">
        {!! Form::submit('Edit Subject', ['class' => 'btn btn-xs btn-primary']) !!}
        <a href="{{url('subjects')}}" class="btn btn-xs btn-primary">Back</a>
    </div>
    {!! Form::close() !!}
@stop