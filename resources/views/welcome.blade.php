<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraELearn</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::user() && Auth::user()->hasRole('Admin'))
                        <a href="{{ url('/Okemin') }}">Home</a>

                    @elseif (Auth::user() && Auth::user()->hasRole('Teacher'))
                        <a href="{{ url('/Teacher') }}">Home</a>

                    @elseif (Auth::user() && Auth::user()->hasRole('Student'))
                        <a href="{{ url('/Student') }}">Home</a>

                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name') }}
                </div>

                <div class="links col-md-12">
                    <a href="#">Documentation, Coming Soon!</a>
                    <br>
                    <p>©Copyright 2019 LaraELearn. Created By <strong>LaraELearn's Team</strong>.</p>
                    <h2>SMK BISA-HEBAT!</h2>
                </div>
            </div>
        </div>
    </body>
</html>
