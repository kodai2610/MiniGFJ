@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
      <div class="row">
        @component('components.sidebar')
        @endcomponent
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">管理者用ダッシュボード</h1>
          </div>
          <div class="table-responsive">
          </div>
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
@endsection


