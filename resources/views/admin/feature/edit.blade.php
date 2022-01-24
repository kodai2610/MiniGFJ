@extends('layouts.admin.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.admin.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">業界編集</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">シェア</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">輸出</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              今週
            </button>
          </div>
        </div>
        <form class="card w-100 shadow-sm" action="{{ route('admin.industry.update', $industry->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="mb-3 row">
              <label for="name" class="col-sm-2 col-form-label" style="font-size: 1.2rem">業界名</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $industry->name) }}"><!--old第二引数はデフォルト値-->
                @if ($errors->any())
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li style="color:red;">{{$error}}</li>
                    @endforeach
                  </ul>
                @endif
              </div>
            </div>
            <a href="{{ route('admin.industry.index') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">保存</button>
          </div>
        </form>
      </main>
    </div>
  </div>
@endsection
