@extends('layouts.master')

@section('content')
    <h1>Edit: {{ $user->room }} - {{ $user->project }}</h1>
    <hr />
    <ul>
        {!! Form::model($user,['method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}
        @include('users.form', ['submitButtonText'=>'Update User', 'currentForm' => 'edit'])
        {!! Form::close() !!}
    </ul>

@stop
