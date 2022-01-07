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

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>保存されたレポート</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          今月
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          前四半期
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          社会的関与
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          年末販売
        </a>
      </li>
    </ul>
  </div>
</nav>
