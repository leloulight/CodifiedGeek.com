@extends('layouts.master')
@section('titleheader')
    Edit/Add Jobs/Positions
@stop
@section('content')
    <h1>Jobs/Positions Held <small><a href="{{ action('JobsController@create') }}" title="Add Another Job"><span class="glyphicon glyphicon-plus-sign"></span> New</a></small></h1>
    <hr />
    @foreach ($jobs as $job)
        <article>
            <h2>
                <a class="text-primary" href=""><small><span class="glyphicon glyphicon-edit"></span></small></a>
                {{ $job->company }}
                <a class="pull-right btn btn-danger remove-item-confirm" data-toggle="modal" data-target="#confirm-delete-modal" data-href="{{ action('AchievementsController@destroy',[$job->id]) }}" href=""><span class="glyphicon glyphicon-trash"></span> Delete Job</a>
            </h2>
            <hr />
            <h4>{{ $job->jobtitle }}</h4>

            {!!
                $test = "";
                if($job->currentlyemployed === 1) {
                    $endDate = strtotime(date('Y-m-d',time()));
                } else {
                    $endDate = strtotime($job->enddate);
                }
                $days = (($endDate - strtotime($job->startdate)) / 86400);
                $time = $days/365;
                $months = $time/12;//get the number of months
                //next we need the years/months/days
                if($time >= 1) {
                    //multiple years
                    $time = round($time);
                    if($time > 1) {
                        $time .= " years";
                    } else {
                        $time .= " year";
                    }
                } else {
                    //multiple months
                    $time = round($months);
                    if($time > 1) {
                        $time .= " months";
                    } else {
                        $time = "1 month";
                    }
                }
            !!}
            <p>{{ date("F Y", strtotime($job->startdate)) }} - {{ $job->currentlyemployed == 1 ? "Present":date("F Y", strtotime($job->enddate)) }} ({{ $time }}) - {{ $job->city }}, {{ $job->state }}</p>
            <p>{{ $job->jobdescription }}</p>
                <h4>Achievements <a class="text-success" href="{{ action('AchievementsController@create',[$job->id]) }}"><span class="glyphicon glyphicon-plus-sign"></span> New</></a></h4>
                @if(empty($job->achievements[0]))
                    <p>There are no achievements.</p>
                @endif
                <ul>
                    @foreach($job->achievements as $achievement)
                        <li>
                            {!! $achievement->description !!} @if($achievement->url) - <a href="{!! $achievement->url !!}">{!! $achievement->url !!}</a> @endif
                            <a href="{{ action('AchievementsController@edit',[$achievement->id]) }}"><small><span class="glyphicon glyphicon-edit"></span></a></small>
                            <a class="text-danger remove-item-confirm" data-toggle="modal" data-target="#confirm-delete-modal" data-href="{{ action('AchievementsController@destroy',[$achievement->id]) }}" href="" title="Delete the Achievement"><span class="glyphicon glyphicon-remove"></span> Delete</a>                        </li>
                    @endforeach
                </ul>

        </article>
    @endforeach
    @include('partials.confirmdelete')
@stop
