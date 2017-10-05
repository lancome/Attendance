{{--{!! Form::hidden('user_id',1) !!}--}}
{{--'student_id',--}}
{{--'subject_id',--}}
{{--'is_was'--}}

<div class="form-group">
    {!! Form::label('pivot_id', 'pivot_id: ') !!}
    {!! Form::text('pivot_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('student_id', 'student_id: ') !!}
    {!! Form::text('student_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_was', 'is_was: ') !!}
    {!! Form::text('is_was', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('att_date', 'Att Date: ') !!}
    {!! Form::input('date', 'att_date', date('Y-m-d') , ['class' => 'form-control']) !!}
</div>