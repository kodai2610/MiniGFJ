<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->named('user.home.index') ? 'active' : '' }}" href="{{ route('user.home.index') }}">
          <span data-feather="home"></span>
          求人<span class="sr-only">(現位置)</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link {{ request()->route()->named('company.job*') ? 'active' : '' }}" href="{{ route('company.job.index') }}">
          <span data-feather="file"></span>
          求人管理
        </a>
      </li> --}}
    </ul>
  </div>
</nav>
