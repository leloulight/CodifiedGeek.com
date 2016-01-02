@extends('layouts.master')
@section('title')
    Create a new Education
@stop
@section('content')


    <hr />
    {!! Form::open(['url' => 'educations','name'=>'education', 'id'=>'educationform']) !!}
    @include('educations.form', ['submitButtonText'=>'Create Education'])
    {!! Form::close() !!}

@stop


