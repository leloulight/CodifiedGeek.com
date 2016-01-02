
@extends('layouts.master')
@section('title')
    Backoffice Login
@stop
$
@section('content')
    <p class="text-info">Please fill out the following fields to register.</p>
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password:') !!}
            {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
        </div>
        <div class="row">
             <button class="btn btn-primary btn-lg" type="submit">Register</button>
        </div>
    </form>
@stop