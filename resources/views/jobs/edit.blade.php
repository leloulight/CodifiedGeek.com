@extends('layouts.master')
@section('title')
    Edit Job Entry
@stop
@section('content')


    <hr />
    {!! Form::model($job,['method' => 'PATCH', 'action' => ['JobsController@update', $job->id],'name'=>'job', 'id'=>'jobform']) !!}
        @include('jobs.form', ['submitButtonText'=>'Update Job'])
    {!! Form::close() !!}

@stop


