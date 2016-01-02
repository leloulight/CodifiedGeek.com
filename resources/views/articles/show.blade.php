@extends('layouts.master')

@section('content')

        <article>
            <h1>{{ $article->title }}</h1>
            <hr />
            <div class="body">{{ $article->body }}</div>
        </article>

@stop
