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
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>メッセージ</th>
                <th>職種</th>
                <th>登録日</th>
                <th>アクション</th>
              </tr>
            </thead>
            @component('components.flash')
            @endcomponent
            <tbody>
              @foreach ($jobs as $job)
              <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ Str::limit($job->display_message, 20) }}</td>
                <td>{{ $job->occupation->name }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$job->created_at)->format("Y年m月d日") }}</td>
                <td>
                  <a type="button" href="{{ route('company.job.edit', $job->id) }}" class="btn btn-outline-danger">編集</a>
                  <a type="button" href="{{ route('company.job.show', $job->id) }}" class="btn btn-outline-danger">詳細</a>
                  <!--urlに入る変数はrouteの第二引数に入る-->
                  <form action="{{ route('company.job.destroy',$job->id) }}" method="post" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">削除</button>
                  </form>
                  <!--削除ボタンはaタグではなくform+submit-->
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $jobs->links() }}
        </div>
      </main>
    </div>
  </div>
  <script type="module">
    $(function(){
      $('.flash_message').fadeOut(2000);
    });
  </script>
@endsection
