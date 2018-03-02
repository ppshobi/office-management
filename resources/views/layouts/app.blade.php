<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <style>
        #loader {
            transition: all 0.3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000;
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden;
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
            animation: sk-scaleout 1.0s infinite ease-in-out;
        }

        @-webkit-keyframes sk-scaleout {
            0% { -webkit-transform: scale(0) }
            100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            } 100% {
                  -webkit-transform: scale(1.0);
                  transform: scale(1.0);
                  opacity: 0;
              }
        }
    </style>
    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 300);
        });
    </script>
</head>
<body class="app">

    <div id='loader'>
        <div class="spinner"></div>
    </div>
    <!-- @App Content -->
    <!-- =================================================== -->
    <div id="app">
        <!-- #Left Sidebar ==================== -->
        @include('layouts.partials.menu')
        <!-- #Main ============================ -->
        <div class="page-container">
            <!-- ### $Topbar ### -->
            @include('layouts.partials.navbar')
            <!-- ### $App Screen Content ### -->
            <main class='main-content bgc-grey-100'>
                <div id='mainContent'>
                    @yield('content')
                </div>
            </main>

            <!-- ### $App Screen Footer ### -->
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>Copyright © 2018 Developed by <a href="https://shobi.in" target='_blank' title="Shobi">Shobi</a>. All rights reserved.</span>
            </footer>
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>

@yield('scripts')
</html>

