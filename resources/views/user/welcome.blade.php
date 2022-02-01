<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            @component('components.flash')
            @endcomponent
            @if (Route::has('user.login'))
                <div class="top-right links">
                    @auth('users')
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('user.login') }}">ユーザーログイン</a>

                        @if (Route::has('user.register'))
                            <a href="{{ route('user.register') }}">ユーザー登録</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <a href="{{ route('admin.login') }}" class="btn btn-primary btn-lg pt-4 pb-4 pl-5 pr-5" style="font-size: 2rem;">管理者用</a>
                <a href="{{ route('company.login') }}" class="btn btn-secondary btn-lg ml-3 pt-4 pb-4 pl-5 pr-5" style="font-size: 2rem;">企業用</a>
            </div>
        </div>
        <script type="module">
            $(function(){
                $('.flash_message').fadeOut(2000);
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script type="module">
            @if(session('msg_logout'))
                $(function () {
                    toastr.success('{{ session('msg_logout') }}');
                });
            @endif;
        </script>
    </body>
</html>
