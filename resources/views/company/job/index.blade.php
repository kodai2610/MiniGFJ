@extends('layouts.company.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.company.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">求人一覧</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('company.job.create') }}" class="btn btn-primary btn-lg">新規作成</a>
          </div>
        </div>
        <div class="container card-columns">
          @foreach ($jobs as $job)
            <div class="card">
              {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg> --}}
              <img src="{{\Storage::url($job->img)}}" alt="" style="width:100%;height:180px;">
              <div class="card-body">
                <h5 class="card-title">{{ $job->title }}</h5>
                <p class="card-text">{{ $job->display_message }}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">{{ $job->occupation->name }}</small>
              </div>
            </div>
          @endforeach
        </div>
      </main>
    </div>
  </div>
@endsection
