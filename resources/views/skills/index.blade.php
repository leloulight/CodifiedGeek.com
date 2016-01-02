@extends('layouts.master')
@section('titleheader')
    Edit/Add Skills
@stop
@section('content')
    <div class="pull-right"><a class="text-right btn btn-primary" href="{{ action('SkillCategoriesController@index') }}"><span class="glyphicon glyphicon-th"></span> Skill Manager</a></div>
    <h1>Skills <small><a href="{{ action('SkillsController@create') }}" title="Add Another Skill"><span class="glyphicon glyphicon-plus-sign"></span> New</a></small> </h1>
    <hr />


        @foreach ($skillcategories as $category)
            <h3>{{ $category->title }}</h3>
            <ul>

            @foreach($category->skills as $skill)
                <li>{{ $skill->skilltitle }} - {{ $skill->yearsexp }} Years <a class="text-primary" href="{{ action('SkillsController@edit',[$skill->id]) }}"><small><span class="glyphicon glyphicon-edit"></span></small></a> <a class="text-danger remove-item-confirm" data-toggle="modal" data-target="#confirm-delete-modal" data-href="{{ action('SkillsController@destroy',[$skill->id]) }}" href=""><span class="glyphicon glyphicon-trash"></span> Delete</a></li>
            @endforeach

            </ul>
        @endforeach

    @include('partials.confirmdelete')
@stop
