<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pos Billing System</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="{{asset('font/fonts.css')}}">

    @livewireStyles

</head>

<body>
    <section class="add__categories">

        {{-- navbar --}}

        @include('layouts.partials.__navbar')

        {{-- /navbar --}}

        <div class="container">
            <div class="col-md-12 body-class ">

                <div class="row">
                    @yield('components')
                </div>


            </div>
        </div>

    </section>

    @livewireScripts
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

</body>

</html>
