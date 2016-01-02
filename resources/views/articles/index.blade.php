@extends('layouts.master')

@section('content')
    <h1>Latest Articles</h1>
    <hr />
    @foreach ($articles as $article)
        <article>
                <h2>
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">{{ $article->title }}</a>
                </h2>
                <div class="body">{!! $article->body !!}</div>
        </article>
    @endforeach

@stop
