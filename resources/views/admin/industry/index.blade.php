@extends('layouts.admin.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.admin.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">業界一覧</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.industry.create') }}" class="btn btn-primary btn-lg">新規作成</a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>業界名</th>
                <th>アクション</th>
              </tr>
            </thead>
            @component('components.flash')
            @endcomponent
            <tbody>
              @foreach ($industries as $industry)
              <tr>
                <td>{{ $industry->id }}</td>
                <td>{{ $industry->name }}</td>
                <td>
                  <a type="button" href="{{ route('admin.industry.edit', $industry->id) }}" class="btn btn-outline-danger">編集</a>
                  <!--urlに入る変数はrouteの第二引数に入る-->
                  <form action="{{ route('admin.industry.destroy',$industry->id) }}" method="post" style="display:inline-block;">
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
          {{ $industries->links() }}
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
