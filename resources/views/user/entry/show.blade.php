@extends('layouts.user.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.user.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">メッセージ</h1>
          {{-- <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('company.job.create') }}" class="btn btn-primary btn-lg">新規作成</a>
          </div> --}}
        </div>
        <div class="container d-flex" style="justify-content: left;max-width:100%;">
          <div class="list-group" style="width: 20%;">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$entry->job->company->name}}</h5>
              </div>
              <p class="mb-1">{{$entry->job->title}}</p>
              <small>{{$entry->job->occupation->name }}</small>
            </a>
          </div>
          <div style="width:80%;">
            <div class="chat-container row justify-content-center">
              <div class="chat-area">
                <div class="card">
                  <div class="card-header">チャットルーム</div>
                  <div class="card-body chat-card">
                    <div id="comment-data"></div>
                    {{-- @foreach ($messages as $item)
                      @include('components.message',['item' => $item])
                    @endforeach --}}
                  </div>
                </div>
              </div>
            </div>
            <form action="{{ route('user.entry.add', $entry->id) }}" method="post" >
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
          // $("#comment-data")
          //   .find(".comment-visible")
          //   .remove();
          // for(var i = 0; i < data.messages.length; i++) {
          //   var html = `
          //     <div class="media">
          //       <div class="media-body comment-body">
          //           <div class="row">
          //               @if ($item->is_user)
          //               <span class="comment-body-user">{{$item->entry->user->name}}</span>
          //               @else 
          //               <span class="comment-body-user">{{$item->entry->job->company->name}}</span>
          //               @endif
          //               <span class="comment-body-time">{{$item->created_at}}</span>
          //           </div>
          //           <span class="comment-body-content">
          //               <div id="comment-data"></div>
          //               {{$item->message}}
          //           </span>
          //       </div>
          //     </div>
          //   `
          // }
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
