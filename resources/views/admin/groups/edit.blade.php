@extends('layouts.app')
@section('content')
    <h1>Edit: {{$group->code}}</h1>
    <hr>
    {!! Form::model($group, ['method' => 'PATCH', 'action' => ['Admin\GroupController@update', $group->id]]) !!}
    @include('admin.groups._form')
    <div class="form-group">
        {!! Form::submit('Edit Group', ['class' => 'btn btn-xs btn-primary']) !!}
        <a href="{{url('groups')}}" class="btn btn-xs btn-primary">Back</a>
    </div>
    {!! Form::close() !!}
@stop