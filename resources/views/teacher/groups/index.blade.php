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
                        <tr>
                            <td>{{$group->code}}</td>
                            <td><span class="badge">{{count($group->students)}}</span></td>
                        </tr>




                        {{--@foreach($group as $item)--}}
                            {{--<tr>--}}
                                {{--<td>{{ $item->id}}</td>--}}
                                {{--<td>{{ $item->subject_id}}</td>--}}
                                {{--<td><span class="badge"></span></td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
