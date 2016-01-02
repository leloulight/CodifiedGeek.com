@extends('layouts.master')
@section('title')
    <h1>Edit Achievement Entry for {{ $achievement->job->company }} - {{ $achievement->job->jobtitle }}</h1>
@stop
@section('content')


    <hr />
    {!! Form::model($achievement,['method' => 'PATCH', 'action' => ['AchievementsController@update', $achievement->id],'name'=>'achievement', 'id'=>'achievementform']) !!}
        {!! Form::hidden('job_id', $achievement->job_id) !!}
        @include('achievements.form', ['submitButtonText'=>'Update Achievement'])
    {!! Form::close() !!}

@stop


