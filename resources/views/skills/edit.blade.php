@extends('layouts.master')
@section('title')
    Edit Skill
@stop
@section('content')


    <hr />
    {!! Form::model($skill,['method' => 'PATCH', 'action' => ['SkillsController@update', $skill->id],'name'=>'skill', 'id'=>'skillform']) !!}
        @include('skills.form', ['submitButtonText'=>'Update Skill'])
    {!! Form::close() !!}

@stop


