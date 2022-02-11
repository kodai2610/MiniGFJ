@extends('layouts.user.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.user.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">応募した求人一覧</h1>
          {{-- <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('company.job.create') }}" class="btn btn-primary btn-lg">新規作成</a>
          </div> --}}
        </div>
        <div class="container card-deck" style="flex-wrap:wrap">       
          @foreach ($entries as $entry)
            <a class="card mt-3" style="max-width:30%;min-width:30%;" href="{{ route('user.entry.show', $entry->id) }}">
              <img src="{{\Storage::url($entry->job->img)}}" alt="" style="width:100%;height:180px;">  
              <div class="card-body">
                <h5 class="card-title">{{ $entry->job->title }}</h5>
                <ul class="card-text list-group list-group-flush">
                    <li class="list-group-item">{{ $entry->job->company->name }}</li>
                    <li class="list-group-item">{{ Str::limit($entry->job->display_message, 20) }}</li>
                    {{-- <li class="list-group-item"><a href="{{ route('user.entry.index') }}" class="btn btn-secondary">戻る</a></li> --}}
                </ul>
                {{-- <p class="card-text">{{ $job->display_message }}</p> --}}
              </div>
              <div class="card-footer">
                <small class="text-muted">{{ $entry->job->occupation->name }}</small>
              </div>
            </a>
          @endforeach
        </div>  
        <div class="mt-4">{{ $entries->links() }}</div>    
      </main>
    </div>
  </div>
@endsection
