@extends('layouts.master')
@section('title')
    Edit Education
@stop
@section('content')


    <hr />
    {!! Form::model($education,['method' => 'PATCH', 'action' => ['EducationsController@update', $education->id],'name'=>'education', 'id'=>'educationform']) !!}
        @include('educations.form', ['submitButtonText'=>'Update Education'])
    {!! Form::close() !!}

@stop


