@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Students</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="panel-body">
                    {!! Form::open(['url' => 'pivots/'. $pivotId .'/students']) !!}
                        @include('teacher.students._form')
                    {{ Form::submit('Add Lesson', array('class' => 'btn btn-xs btn-primary')) }}
                    <a href="{{ URL::to('pivots/') }}" class="btn btn-xs btn-primary pull-right">Back</a>
                    <p></p>
                    <table class="table table-hover">
                            <tbody>
                            @foreach($students as $item)
                            <tr>
{{--                                <td><a href="{{ url('pivots/'.$pivotId.'/students/'.$item->id.'/attendances') }}">{{$item->id}}</a></td>--}}
                                <td><a href="{{ url('pivots/'.$pivotId.'/students/'.$item->id.'/attendances') }}">{{$item->lastname}}</a></td>
                                <td>{{$item->student_code}}</td>
                                <td>{{$item->group->code}}</td>

                                {{--<td>{{$item->id}}</td>--}}
                                {{--<td>{{$item->pivot_id}}</td>--}}
                                {{--<td>{{$item->student_id}}</td>--}}
                                {{--<td>{{$item->is_was}}</td>--}}
                                {{----}}
                                {{--<td>--}}
                                    {{--<input type="checkbox"--}}
                                           {{--name="att[]"--}}
                                           {{--value="{{$item->id}}"--}}
                                           {{--{{$item->is_was ? 'checked' : ''}}--}}
                                    {{-->--}}

                                {{--</td>--}}
                                {{--<td>{{ Form::checkbox($item->oneattendance->is_was) }}</td>--}}
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection