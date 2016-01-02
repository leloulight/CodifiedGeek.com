@extends('layouts.master')

@section('content')

    <h1>Edit: {{ $article->title }}</h1>
    <hr />
    {!! Form::model($article,['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id], 'files' => true]) !!}
        @include('articles.form', ['submitButtonText'=>'Update Article'])

    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('scripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prettify.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-wysihtml5.css') }}" />
    <script type="text/javascript" src="{{ asset('js/prettify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('.wysiwyg-editor').wysihtml5();
            $(prettyPrint);


        });



    </script>
@stop
