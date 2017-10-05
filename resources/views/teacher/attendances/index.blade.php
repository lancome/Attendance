@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Student Attendance: {{round($att,2)}}%</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel-body">
                    <a href="{{ URL::to('pivots/'. $pivotId .'/students/') }}" class="btn btn-xs btn-primary">Back</a>
                    {{--<a href="{{ URL::previous() }}" class="btn btn-xs btn-primary">Back</a>--}}
                    <p></p>
                    <table class="table table-hover">
                        <tbody>
                        @foreach($attendances as $item)
                            {{--@if($item->is_was==true)--}}
                                {{--$was++;--}}
                            {{--@elseif($item->is_was==false)--}}
                                {{--$wasnt++;--}}
                            {{--@endif--}}
                            <tr>
                                <td>{{$item->student->lastname}} {{$item->student->name}}</td>
                                <td>({{$item->student->student_code}})</td>
                                {{--<td>{{$item->pivot_id}}</td>--}}
                                {{--<td>{{$item->student_id}}</td>--}}
                                <td>{{$item->description}}</td>
                                <td>{{$item->att_date}}</td>
                                {{--<td>{{$item->is_was}}</td>--}}

                                <td>
                                    {!! Form::open(['url' => 'pivots/'. $pivotId .'/students/'. $studentId. '/attendances']) !!}

                                    <input type="checkbox"
                                       onClick="this.form.submit()"
                                {{$item->is_was ? 'checked' : ''}}
                                >
                                <input type="hidden"
                                       name="att"
                                       value="{{$item->id}}"
                                >
                                {!! Form::close() !!}

                                {{--</td>--}}
                                {{--<td>{{ Form::checkbox($item->oneattendance->is_was) }}</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection