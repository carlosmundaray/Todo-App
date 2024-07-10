<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}
">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{ !! csrf_token() !! }">
    @if(app()->getLocale()=='ar')
        <link rel="stylesheet" href="{{asset('dashboard/css/font-awesome-rtl.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/css/AdminLTE.min.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/css/rtl.css')}}">

        <style>
        body , h1 ,h2 ,h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif;        }
        </style>

    @else
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">

    @endif

</head>
<body>
    <!------ Navebar ------->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="">@lang('site.todo')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="{{route('todo')}}">@lang('site.Todos')</a>
            </>
             <li class="nav-item">
                 <a class="nav-link" href="{{route('todo.create')}}">@lang('site.Create_Todo')</a>
             </li>
        <ul class="menu">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul>
        </ul>


    </div>
</nav>
    @yield('content')
    @yield('scripts')
</body>
</html>
