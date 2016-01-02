@extends('layouts.master')
@section('title')
    Create a new Job Entry
@stop
@section('content')


    <hr />
    {!! Form::open(['url' => 'jobs','name'=>'job', 'id'=>'jobform']) !!}
    @include('jobs.form', ['submitButtonText'=>'Create Job'])
    {!! Form::close() !!}

@stop


