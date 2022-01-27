@extends('layouts.company.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.company.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">メッセージ</h1>
        </div>
        <div class="container d-flex" style="justify-content: left;max-width:100%;">
          <div class="list-group" style="width: 20%;">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$entry->user->name}}</h5>
              </div>
              <p class="mb-1">{{$entry->user->birth_day}}</p>
              <small>
                @if ($entry->user->gender === 1)
                  男性
                @elseif($entry->user->gender === 2)
                  女性
                @elseif($entry->user->gender === 0)
                  未回答
                @endif
              </small>
            </a>
          </div>
          <div style="width:80%;">
            <div class="chat-container row justify-content-center">
              <div class="chat-area">
                <div class="card">
                  <div class="card-header">チャットルーム</div>
                  <div class="card-body chat-card">
                    {{-- <div id="comment-data"></div> --}}
                    @foreach ($messages as $item)
                      @include('components.message',['item' => $item]) 
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <form action="{{ route('company.entry.add', $entry->id) }}" method="post" >
              @csrf
              <div class="comment-container row justify-content-center">
                <div class="input-group comment-area">
                  <textarea class="form-control" placeholder="Shift + Enterで送信" aria-label="With textarea" name="message"
                  onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                  <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">送信</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script type="module">
    function get_data() {
      $.ajax({
        url: "/get-messages",
        dataType: "json",
        success: data => {
          console.log(data);
          // 成功時の処理
        },
        error: () => {
          alert("ajax Error");
        }
      })
      setTimeout(get_data, 5000);
    }
    $(function() {
      get_data();
    })
    
  </script>
@endsection
