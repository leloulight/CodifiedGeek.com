@extends('layouts.master')
@section('title')
    Create a new Skill
@stop
@section('content')


    <hr />
    {!! Form::open(['url' => 'skills','name'=>'skill', 'id'=>'skillform']) !!}
    @include('skills.form', ['submitButtonText'=>'Create Skill','skill_categories'=>$skill_categories])
    {!! Form::close() !!}

@stop


