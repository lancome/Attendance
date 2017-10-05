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
                                <td>{{$item->name}}</td>
                                <td>{{$item->subject_code}}</td>
                                <td>{{$item->semester}}</td>
                                <td>{{$item->language}}</td>

                                {{ Form::open(array('url' => 'subjects/' . $item->id, 'class' => 'pull-right')) }}

                                        <td>
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
                                            <a class="btn btn-xs btn-primary" href="{{ URL::to('subjects/' . $item->id . '/edit') }}">Edit</a>
                                        </td>
                                {{ Form::close() }}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $subject->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection