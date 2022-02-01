<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-size: .875rem;
        }

        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
        }

        /*
        * サイドバー
        */

        .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100; /* ナビゲーションバーの背面 */
        padding: 48px 0 0; /* ナビゲーションバーの高さ */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        @media (max-width: 767.98px) {
        .sidebar {
            top: 5rem;
            }
        }

        .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* ビューポートがコンテンツより短い場合、スクロール可能なコンテンツ */
        }

        @supports ((position: -webkit-sticky) or (position: sticky)) {
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
        }
        }

        .sidebar .nav-link {
        font-weight: 500;
        color: #333;
        }

        .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
        }

        .sidebar .nav-link.active {
        color: #007bff;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
        color: inherit;
        }

        .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
        }

        /*
        * ナビゲーションバー
        */

        .navbar-brand.navbar-brand-dark {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
        }

        .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
        }

        .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

        label.required::before {
            position: absolute;
            content: '*';
            width: 3px;
            height: 3px;
            color: red;
            left: 3px;
        }
        .chat-container {
  width: 100%;
  height: 100%;
}

.chat-card {
  height: 55vh;
  overflow: auto;
}

.chat-area {
  width: 70%;
}

.comment-container {
  margin-top: 10px;
  text-align: center;
  width: 100%;
}

.comment-area {
  width: 70%;
}

.comment-btn {
  margin: 0px 10px;
}

.comment-body {
  padding: 5px 30px 20px 30px;
}

.comment-body:hover {
  background-color: #dfdfdf;
}

.comment-body-user {
  font-weight: bold;
  font-size: 20px;
}

.comment-body-time {
  font-size: 10px;
  margin-top: 10px;
  margin-left: 5px;
  color: #a0a0a0;
}
.card {
  height: 100%;
}
/*# sourceMappingURL=view.css.map */
</style>
</head>
<body>
    <div id="app">
        @if (Auth::guard('companies')->check())
            @component('components.company.dashboard_header')
            @endcomponent
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @if(Auth::guard('companies')->check())
        @component('components.feather')
        @endcomponent
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="module">
      @if (session('msg_create'))
        $(function () {
          toastr.success('{{ session('msg_create') }}');
        });
      @endif;
      @if (session('msg_update'))
        $(function () {
          toastr.success('{{ session('msg_update') }}');
        });
      @endif;
      @if (session('msg_destroy'))
        $(function () {
            toastr.danger('{{ session('msg_destroy') }}');
        });
      @endif;
    </script>
</body>
</html>
