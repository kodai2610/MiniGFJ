<nav class="navbar navbar-dark navbar-light sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand navbar-brand-dark col-md-3 col-lg-2 mr-0 px-3"
        href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="サイドバーメニュー" aria-expanded="false" aria-label="ナビゲーションの切替">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="search" placeholder="検索" aria-label="検索">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('company.logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
        </li>
        <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</nav>
