@extends('layouts.company.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.company.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">応募者一覧</h1>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>性別</th>
                <th>地域</th>
                <th>応募求人</th>
                <th>アクション</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jobs as $job)
                @foreach ($job->entries as $entry)
                  <tr>
                    <td>{{ $entry->user->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($entry->user->birth_day)->age }}才</td>
                    {{-- <td>{{ $entry->user->birth_day }}</td> --}}
                    <td>
                      @if ($entry->user->gender === 1)
                        男性
                      @elseif($entry->user->gender === 2)
                        女性
                      @elseif($entry->user->gender === 0)
                        未回答
                      @endif
                    </td>
                    <td>{{ $entry->user->prefecture->name }} {{ $entry->user->city->name }}</td>
                    <td>{{ $entry->job->title }}</td>
                    {{-- <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$job->created_at)->format("Y年m月d日") }}</td> --}}
                    <td>
                      <a type="button" href="{{ route('company.entry.show', $entry->id) }}" class="btn btn-outline-danger">メッセージ</a>
                      <form action="{{ route('company.entry.destroy',$entry->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">ブロック</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
@endsection
