@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to my application!</div>

                <div class="panel-body">
                    <h3>This is <u>Attendance Application</u>, made by <u>Jegor Salajev RDIR61!</u></h3>
                    @if(Auth::guest())
                        <h3>Please <a href="login">Sign In!</a></h3>
                        @elseif(Auth::user()->role->isAdmin())
                        <h1>You are admin</h1>
                        @elseif(Auth::user()->role->isTeacher())
                        <h1>You are Teacher</h1>
                    @endif
                    <p>All rights reserved &reg;</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
