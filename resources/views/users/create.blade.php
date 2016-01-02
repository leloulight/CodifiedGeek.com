@extends('layouts.master')
@section('content')
    <h1>Create New Backoffice User</h1>
    <hr />
    <p>Please fill out the following information to create a user.</p>
    <ul>
        {!! Form::open(['url' => 'users']) !!}
        @include('users.form', ['submitButtonText'=>'Create User', 'currentForm' => 'create'])
        {!! Form::close() !!}
    </ul>

@stop
