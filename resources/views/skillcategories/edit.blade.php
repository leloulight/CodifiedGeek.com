@extends('layouts.master')
@section('title')
    Edit Skill Category
@stop
@section('content')


    <hr />
    {!! Form::model($skillcategory,['method' => 'PATCH', 'action' => ['SkillCategoriesController@update', $skillcategory->id],'name'=>'job', 'id'=>'skillcategoriesform']) !!}
        @include('skillcategories.form', ['submitButtonText'=>'Update Skill Category'])
    {!! Form::close() !!}

@stop


