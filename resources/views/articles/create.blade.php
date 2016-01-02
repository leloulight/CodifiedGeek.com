@extends('layouts.master')

@section('content')

    <h1>Write a New Article</h1>
    <hr />
    {!! Form::open(['url' => 'articles', 'files'=>true]) !!}
        @include('articles.form', ['submitButtonText'=>'Create Article'])
    {!! Form::close() !!}

@stop


