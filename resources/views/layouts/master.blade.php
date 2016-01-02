<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')@yield('titleheader')</title>

    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-validate.bootstrap-tooltip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/confirm-delete.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" />
    @yield('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('div.alert').delay(3000).slideUp(300);//slide the message back up once displayed
        });
    </script>

</head>
<body>
@include("layouts.nav.admin")
<div class="container" style="margin-top:50px">
    <h1>@yield('title')</h1>
    @include('errors.list')
    @if (Session::has('success'))
        <div class="row">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! Session::get('success') !!}
            </div>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="row">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! Session::get('error') !!}
            </div>
        </div>
    @endif
    <div class="row">
        @yield('content')
    </div>
</div>

<footer>
    <div class="container">
        <p class="text-muted"><strong>&copy; Codified Geek {{ date("Y",time()) }}</strong></p>
    </div>
</footer>
</body>
</html>