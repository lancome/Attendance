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
                                <td>{{$item->lastname}}</td>
                                <td>{{$item->student_code}}</td>
                                <td>{{$item->group->code}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection