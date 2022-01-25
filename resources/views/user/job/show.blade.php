@extends('layouts.user.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.user.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">{{$job->company->name}}の求人</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('user.job.index') }}" class="btn btn-secondary btn-lg">戻る</a>
            @unless ($job->entries->contains('user_id',Auth::id()))
              <form action="{{ route('user.entry.store', $job->id) }}" method="post" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-warning btn-lg ml-2">応募する</button>
              </form>
            @endunless
            {{-- <a href="{{ route('user.entry.show', $job->id) }}" class="btn btn-warning btn-lg ml-2">応募する</a>   --}}
          </div>
        </div>
        <div class="table-responsive">
          <dl class="row">
            <dt class="col-3 h4">タイトル</dt>
            <dd class="col-9 h4">{{ $job->title }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">メッセージ</dt>
            <dd class="col-9 h4">{{ $job->display_message }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">イメージ画像</dt>
            <dd class="col-9 h4"><img src="{{ \Storage::url($job->img) }}" alt="" width="200px;"></dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">募集背景</dt>
            <dd class="col-9 h4">{{ $job->display_message }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">募集職種</dt>
            <dd class="col-9 h4">{{ $job->occupation->name }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">募集内容</dt>
            <dd class="col-9 h4">{{ $job->content }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">雇用形態</dt>
            <dd class="col-9 h4">
              @foreach ($job->empTypes as $empType)
                <span>{{ $empType->name }}　</span>
              @endforeach
            </dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">給与体系</dt>
            @if($job->salary_type === 1)
            <dd class="col-9 h4">月給</dd>
            @elseif($job->salary_type === 2)
            <dd class="col-9 h4">時給</dd>
            @elseif($job->salary_type === 3)
            <dd class="col-9 h4">日給</dd>
            @endif
          </dl>
          <dl class="row">
            <dt class="col-3 h4">給与</dt>
            <dd class="col-9 h4">{{ $job->salary_min }}円 〜 {{ $job->salary_max }}円</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">勤務地</dt>
            <dd class="col-9 h4">{{ $job->location }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">勤務時間</dt>
            <dd class="col-9 h4">{{ $job->work_hour }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">休日・休暇</dt>
            <dd class="col-9 h4">{{ $job->day_off }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">資格</dt>
            <dd class="col-9 h4">{{ $job->license }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-3 h4">特徴</dt>
            <dd class="col-9 h4">
              @foreach ($job->features as $feature)
              <span>{{ $feature->name }}　</span>
              @endforeach
            </dd>
          </dl>
        </div>
      </main>
    </div>
  </div>
@endsection
