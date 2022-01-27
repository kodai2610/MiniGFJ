<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->named('company.home.index') ? 'active' : '' }}" href="{{ route('company.home.index') }}">
          <span data-feather="home"></span>
          ダッシュボード <span class="sr-only">(現位置)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->named('company.job*') ? 'active' : '' }}" href="{{ route('company.job.index') }}">
          <span data-feather="file"></span>
          求人管理
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->named('company.entry*') ? 'active' : '' }}" href="{{ route('company.entry.index') }}">
          <span data-feather="file"></span>
          応募管理
        </a>
      </li>
    </ul>
  </div>
</nav>
