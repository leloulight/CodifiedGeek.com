<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a style="padding:10px 0;" href="/home"><img class="pull-left" src="{{ asset('images/CodifiedGeek-Logo.png') }}" alt="Codified Geek" height="30" /></a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="{{ action('AdminController@index') }}">Home</a></li>
            <li><a href="{{ action('JobsController@index') }}">Job Manager</a></li>
            <li><a href="{{ action('EducationsController@index') }}">Education Manager</a></li>
            <li><a href="{{ action('SkillsController@index') }}">Skill Manager</a></li>
        </ul>
        <ul class="pull-right nav navbar-nav">
            @if(Auth::check())
                <li style="padding:15px 0;">Welcome {{ Auth::user()->name }}</li>
                <li><a href="/auth/logout" title="Admin Login">Logout</a></li>
            @else
                <li><a href="/auth/login" title="Admin Login">Login</a></li>
            @endif

        </ul>

    </div>
</nav>