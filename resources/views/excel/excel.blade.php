@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Text</div>
                    <div class="panel-body">
                        @foreach($results as $item)
                            {{$item}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
