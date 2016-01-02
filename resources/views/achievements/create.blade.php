@extends('layouts.master')
@section('title')
    <h1>Create a new Achievement for {!! $job->jobtitle !!}</h1>
@stop
@section('content')


    <hr />
    {!! Form::open(['url' => 'achievements','name'=>'achievement', 'id'=>'achievementform']) !!}
    <div class="form-group">
        {!! Form::hidden('job_id', $job->id) !!}
    </div>
    @include('achievements.form', ['submitButtonText'=>'Create Achievement'])
    {!! Form::close() !!}
@stop


