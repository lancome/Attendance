@extends('layouts.app')
@section('content')
    <h1>{{$subject->name}}</h1>
    <hr>
    <h1>{{$subject->subject_code}}</h1>
    <hr>
    <h1>{{$subject->semester}}</h1>
    <hr>
    <h1>{{$subject->language}}</h1>
    <hr>
@stop