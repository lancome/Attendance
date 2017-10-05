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
                        @foreach($group as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td><span class="badge">
                                {{count($item->students)}}</span></td>

                                {{ Form::open(array('url' => 'groups/' . $item->id, 'class' => 'pull-right')) }}

                                        <td>
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
                                            <a class="btn btn-xs btn-primary" href="{{ URL::to('groups/' . $item->id . '/edit') }}">Edit</a>
                                        </td>

                                {{ Form::close() }}

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $group->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
