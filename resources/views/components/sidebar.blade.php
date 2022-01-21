<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->named('admin.home.index') ? 'active' : '' }}" href="{{ route('admin.home.index') }}">
          <span data-feather="home"></span>
          ダッシュボード <span class="sr-only">(現位置)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->named('admin.occupation*') ? 'active' : '' }}" href="{{ route('admin.occupation.index') }}">
          <span data-feather="file"></span>
          職種一覧
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->named('admin.industry*') ? 'active' : '' }}" href="{{ route('admin.industry.index') }}">
          <span data-feather="shopping-cart"></span>
          業界一覧
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="users"></span>
          特徴一覧
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->named('admin.company*') ? 'active' : '' }}" href="{{ route('admin.company.index') }}">
          <span data-feather="users"></span>
          企業管理
        </a>
      </li>
    </ul>
  </div>
</nav>
