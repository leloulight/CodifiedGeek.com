@extends('layouts.master')
@section('titleheader')
    Resume Editor
    @stop
@section('content')
<!-- Joel Mann Summary -->
<div class="cg-section">
    <h2><span class="glyphicon glyphicon-cloud"></span> Summary <small><a href="{{ action('ArticlesController@edit', [$article->id]) }}"><span class="glyphicon glyphicon-edit"></span> Edit</a></small></h2>
    <hr />
    <div class="row">
        <div class="col-md-2"><img style="width:100%" src="{{ url('/images/article') }}{{ "/" . $article->image }}" /></div>
        <div class="col-md-10"><p>{!! $article->body !!}</p></div>
    </div>
</div>
    <!-- Jobs -->
    <div class="cg-section">
        <h2><span class="glyphicon glyphicon-briefcase"></span> Experience<small><a href="{{ action('JobsController@create') }}" title="Add Another Job"> <span class="glyphicon glyphicon-plus-sign"></span> New</a></small></h2>
        <hr />
        @foreach ($jobs as $job)
            <article>
                <h3>
                    <a class="text-primary" href="{{ action('JobsController@edit', [$job->id]) }}"><small><span class="glyphicon glyphicon-edit"></span></small></a>
                    {{ $job->company }}
                    <a class="pull-right btn btn-danger remove-item-confirm" data-toggle="modal" data-target="#confirm-delete-modal" data-href="{{ action('AchievementsController@destroy',[$job->id]) }}" href=""><span class="glyphicon glyphicon-trash"></span> Delete Job</a>
                </h3>
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
    </div>

<!-- Education -->
<div class="cg-section">
    <h2><span class="glyphicon glyphicon-education"></span> Education<small><a href="{{ action('EducationsController@create') }}" title="Add Another Education"> <span class="glyphicon glyphicon-plus-sign"></span> New</a></small></h2>
    <hr />
    @foreach ($educations as $education)
        <article>
            <h3>
                <a href="{{ action('EducationsController@edit',[$education->id]) }}"><small><span class="glyphicon glyphicon-edit"></span></small></a>
                {{ $education->schoolname }}
                <small><a class="text-danger remove-item-confirm" data-toggle="modal" data-target="#confirm-delete-modal" data-href="{{ action('EducationsController@destroy',[$education->id]) }}" href=""><span class="glyphicon glyphicon-remove"></span> Delete</a></small>
            </h3>

            <h4>{{ $education->degree }} | {{ $education->city }}, {{ $education->state }}</h4>
            <p>{{ $education->startyear }} - {{ $education->currentlyenrolled === 1 ? "Expected Graduation " . $education->graduationyear:$education->graduationyear }} </p>
            <p>{{ $education->minor }}</p>

        </article>
   @endforeach
</div>
<!-- Skills -->
<div class="cg-section">
   <div class="pull-right"><a class="text-right btn btn-primary" href="{{ action('SkillCategoriesController@index') }}"><span class="glyphicon glyphicon-th"></span> Skill Manager</a></div>
        <h2><span class="glyphicon glyphicon-wrench"></span> Technical Skills <small><a href="{{ action('SkillsController@create') }}" title="Add Another Skill"><span class="glyphicon glyphicon-plus-sign"></span> New</a></small> </h2>
        <hr />


        @foreach ($skillcategories as $category)
            <h3>{{ $category->title }}</h3>
            <ul>

                @foreach($category->skills as $skill)
                    <li>{{ $skill->skilltitle }} - {{ $skill->yearsexp }} Years <a class="text-primary" href="{{ action('SkillsController@edit',[$skill->id]) }}"><small><span class="glyphicon glyphicon-edit"></span></small></a> <a class="text-danger remove-item-confirm" data-toggle="modal" data-target="#confirm-delete-modal" data-href="{{ action('SkillsController@destroy',[$skill->id]) }}" href=""><span class="glyphicon glyphicon-trash"></span> Delete</a></li>
                @endforeach

            </ul>
        @endforeach
</div>
        @include('partials.confirmdelete')
@stop
