@extends('layouts.master')
@section('title')
    Create a new Job Entry
@stop
@section('content')


    <hr />
    {!! Form::open(['url' => 'skillcategories','name'=>'skillcategories', 'id'=>'skillcategoriesform']) !!}
    @include('skillcategories.form', ['submitButtonText'=>'Create Skill Category'])
    {!! Form::close() !!}

@stop


