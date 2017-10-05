@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>Groups</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($subject as $item)
                        <tr>
                            <td><a href="{{ url('your_subjects/'. $subjectid .'/students/'.$item->id) }}">{{$item->code}}</a></td>
                            <td><span class="badge">{{count($item->students)}}</span></td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
