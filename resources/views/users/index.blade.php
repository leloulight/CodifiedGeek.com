@extends('layouts.master')

@section('content')
    <h1>Backoffice Users</h1>
    <hr />
    <table class="table table-hover">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Disable</th>
        </tr>
    @foreach ($users as $user)
           <tr>
               {!! Form::model($user,['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id]]) !!}
               <td><a href="{{ action('UsersController@edit',[$user->id]) }}">{{ $user->name }}</a></td>
               <td><a href="{{ action('UsersController@edit',[$user->id]) }}">{{ $user->email }}</a></td>
               <td><a href="{{ action('UsersController@edit',[$user->id]) }}"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
               <td><button style="background-color:inherit; border:none; box-shadow:none; color:#337ab7; padding:0;" type="submit" class=""><span class="glyphicon glyphicon-remove"></span> Delete</button></td>
               {!! Form::close() !!}
           </tr>
    @endforeach
    </table>

@stop
