@extends('layouts.master')
@section('titleheader')
    Edit/Add Education
@stop
@section('content')
    <h1>Educational Manager <small><a href="{{ action('EducationsController@create') }}" title="Add Another Education"><span class="glyphicon glyphicon-plus-sign"></span></a></small></h1>
    <hr />
    @foreach ($educations as $education)
        <article>
            <h2>
                <a href="{{ action('EducationsController@edit',[$education->id]) }}"><small><span class="glyphicon glyphicon-edit"></span></small></a>
                {{ $education->schoolname }}

            </h2>
            <a class="text-danger remove-item-confirm" data-toggle="modal" data-target="#confirm-delete-modal" data-href="{{ action('EducationsController@destroy',[$education->id]) }}" href=""><span class="glyphicon glyphicon-remove"></span> Delete</a>
            <hr />
            <h4>{{ $education->degree }} | {{ $education->city }}, {{ $education->state }}</h4>
            <p>{{ $education->startyear }} - {{ $education->currentlyenrolled == 1 ? "Expected Graduation " . date("Y", strtotime($education->graduationyear)):date("Y", strtotime($education->graduationyear)) }} </p>
            <p>{{ $education->minor }}</p>

        </article>
    @endforeach
    @include('partials.confirmdelete')
@stop
