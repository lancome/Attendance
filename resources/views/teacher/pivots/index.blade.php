@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Subjects</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($pivots as $item)
                            <tr>
                                <td><a href="{{ url('pivots/'. $item->id .'/students') }}">{{$item->subject->name}}</a></td>
                                <td>{{$item->subject->subject_code}}</td>
                                <td>{{$item->subject->semester}}</td>
                                <td>{{$item->subject->language}}</td>
                                <td>{{$item->group->code}}</td>
                                <td><span class="badge">{{count($item->group->students)}}</span></td>
                                <td>{{$item->attendance_id}}</td>
                            </tr>
                        @endforeach
                        {{--@foreach($subject as $item)--}}
                            {{--<tr>--}}
                                {{--<td>{{$item->code}}</td>--}}
                                {{--<td>{{$item->name}}</td>--}}
                                {{--<td>{{$item->subject_code}}</td>--}}
                                {{--<td>{{$item->semester}}</td>--}}
                                {{--<td>{{$item->language}}</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection