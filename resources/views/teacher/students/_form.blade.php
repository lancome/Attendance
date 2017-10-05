{{--{!! Form::hidden('user_id',1) !!}--}}
{{--'student_id',--}}
{{--'subject_id',--}}
{{--'is_was'--}}

<div class="form-group">
    {!! Form::label('att_date', 'Lesson Date: ') !!}
    {!! Form::input('date', 'att_date', date('Y-m-d') ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('desc', 'Lesson description: ') !!}
    {!! Form::text('desc', null, ['class' => 'form-control']) !!}
</div>