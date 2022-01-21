@extends('layouts.admin.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">企業詳細</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.company.index') }}" class="btn btn-secondary btn-lg">戻る</a>
          </div>
        </div>
        <div class="table-responsive">
          <dl class="row">
            <dt class="col-3 h4">企業名</dt>
            <dd class="col-9 h4">{{ $company->name }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">メールアドレス</dt>
            <dd class="col-9 h4">{{ $company->email }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">パスワード</dt>
            <dd class="col-9 h4"></dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">業界</dt>
            <dd class="col-9 h4">{{ $company->industry->name }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">本社所在地</dt>
            <dd class="col-9 h4">{{ $company->prefecture->name }} {{ $company->city->name }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">代表者名</dt>
            <dd class="col-9 h4">{{ $company->ceo }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">企業HP</dt>
            <dd class="col-9 h4">{{ $company->url }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">資本金</dt>
            <dd class="col-9 h4">{{ $company->capital }}円</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">ロゴ画像</dt>
            <dd class="col-9 h4"><img src="{{ \Storage::url($company->logo) }}" alt="" style="width: 200px;"></dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">ご担当者名</dt>
            <dd class="col-9 h4">{{ $company->staff_name }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">ご担当者メールアドレス</dt>
            <dd class="col-9 h4">{{ $company->staff_email }}</dd>
          </dl>
        </div>
      </main>
    </div>
  </div>
  @component('components.admin.feather')
  @endcomponent
@endsection
