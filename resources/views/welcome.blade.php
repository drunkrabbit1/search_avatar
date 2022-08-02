<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link href="{{ asset('css\bootstrap.min.css') }}" rel="stylesheet">

        <!-- Favicons -->

        <!-- Styles -->
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .b-example-divider {
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }
        </style>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">

        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand me-xxl-5" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
                <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="row collapse align-content-center navbar-collapse" id="navbarCollapse">

                    <form class="d-flex">
                        <div class="navbar-nav me-xxl-3 col-auto">
                            <select class="d-flex navbar-nav form-select" name="app_code" aria-label="Default select example">
                                <option selected>Выберите тип платформы</option>

                                @foreach($app_types as $app_type)
                                    <option value="{{ $app_type->value }}">{{$app_type->tittle()}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-5 d-flex" role="search">
                            <input class="form-control me-2 w-100" name="link" type="search" placeholder="Search" aria-label="Search">

                            <button id="button-search" class="btn btn-outline-success" type="button">Search</button>
                        </span>
                    </form>
                </div>
            </div>
        </nav>

        <main class="container">

            <div class="bg-light p-5 rounded">
                <img id="img-avatar" src=""
                     class="rounded mx-auto d-block img-fluid height: auto;" style="max-width: 100%; height: auto;">
                <h1 class="text-center text-danger" id="img-avatar-error" >dadsa</h1>
            </div>
        </main>

    <script src="{{ asset('js/search.js') }}"></script>
    </body>
</html>
