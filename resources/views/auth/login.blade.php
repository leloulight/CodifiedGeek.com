@extends('layouts.master')
@section('title')
Administrator Login
@stop

@section('content')
    <p class="text-info"></p>

    <form class="form-horizontal" method="POST" action="/auth/login">
        {!! csrf_field() !!}
        <div class="row form-group form-group-lg">
            <div class="col-lg-1 text-right" >
                <label class="control-label" for="email">Email</label>
            </div>
            <div class="col-lg-3">
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="row form-group form-group-lg">
            <div class="col-sm-1 text-right">
                <label class="control-label" for="password">Password</label>
            </div>
            <div class="col-lg-3">
                <input class="form-control" type="password" name="password" id="password">
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="checkbox col-md-4">
                <label><input type="checkbox" name="remember"> Remember Me</label>
            </div>
        </div>
        <hr />
        <div class="row">
            <button type="submit" class="btn btn-primary btn-lg">Login</button>
        </div>
    </form>
@stop