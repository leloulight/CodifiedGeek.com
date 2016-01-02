@extends('layouts.master')
@section('titleheader')
    Skill Category Manager
@stop
@section('content')
    <h1>Skill Category Manager <small><a href="{{ action('SkillCategoriesController@create') }}" title="Add Another Job"><span class="glyphicon glyphicon-plus-sign"></span> New</a></small></h1>
    <p>The skill categories are listed below.</p>
    <hr />
    @foreach ($skillcategories as $category)
        <article>
            <h2>
                <a class="text-primary" href="{{ action('SkillCategoriesController@edit',[$category->id]) }}"><small><span class="glyphicon glyphicon-edit"></span></small></a>
                {{ $category->title }}
                <a class="pull-right remove-item-confirm" data-toggle="modal" data-target="#confirm-delete-modal" data-href="{{ action('SkillCategoriesController@destroy',[$category->id]) }}" href=""><small><span class="glyphicon glyphicon-trash"></span> Delete</small></a>
            </h2>
            <hr />
            <h4>{{ $category->description }}</h4>

        </article>
    @endforeach
@include('partials.confirmdelete')
@stop
