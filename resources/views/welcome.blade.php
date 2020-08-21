<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #fff;
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
                background-image: url('{{ URL::asset("images/3449401.jpg") }}');
                background-repeat: no-repeat;
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

            .subtitle {
                font-size: 30px;
            }

            .links > a {
                color: #fff;
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

            .m-b-sm {
                margin-bottom: 20px;
            }

            .m-b-lg {
                margin-bottom: 40px;
            }

            .btn-sign{
                text-decoration: none;
                font-size: 16px;
                font-weight: 500;
                line-height: 24px;
                -webkit-box-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                align-items: center;
                align-content: center;
                padding: 10px 20px;
                max-width: 400px;
                background-color: #fff;
                color: #000;
                border-radius: 4px;
                height: 60px;
                margin-bottom: 24px;
                height: 48px;
                position: relative;
                border: none;
            }

            .tech-logo{
                max-width: 15%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-sm">
                    My version pocket
                </div>
                <div class="subtitle m-b-md">
                    Don't forget your sites
                </div>
                <div class="m-b-lg">
                    <a class="btn-sign" href="{{ route('login') }}">Go to login</a>
                </div>

                <img class="tech-logo" src="{{ URL::asset("images/tech.png") }}">
            </div>
        </div>
    </body>
</html>
