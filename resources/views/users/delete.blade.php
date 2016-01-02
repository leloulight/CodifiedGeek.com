@extends('layouts.master')

@section('content')
    <h1>Delete: {{ $room->room }} - {{ $room->project }}</h1>
    <hr />
    <p>Are you sure you want to delete this room?</p>

        {!! Form::model($room,['method' => 'DELETE', 'action' => ['RoomsController@delete', $room->id]]) !!}
        <div class="form-group">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
            <a href="{!! url('rooms') !!}" class="btn btn-danger">Cancel</a>
        </div>
        {!! Form::close() !!}


@stop
