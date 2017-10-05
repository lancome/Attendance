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
                        @foreach($subject as $item)
                            <tr>
                                <td><a href="{{ url('your_subjects', $item->id) }}">{{$item->name}}</a></td>
                                <td>{{$item->subject_code}}</td>
                                <td>{{$item->semester}}</td>
                                <td>{{$item->language}}</td>
                                <td><span class="badge">{{count($item->groups)}}</span></td>
                                {{--<td>{{$item->user->name}}</td>--}}
                                {{--<td>{{$item->group->code}}</td>--}}
                                {{--<td>{{$item->date}}</td>--}}
                                <td>
                                {{ Form::open(array('url' => 'your_subjects/' . $item->id, 'class' => 'pull-right')) }}

                                <td>
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
                                </td>

                                {{ Form::close() }}
                                </td>
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