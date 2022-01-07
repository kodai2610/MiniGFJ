@extends('layouts.admin.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">企業作成</h1>
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
        <form class="card w-100 shadow-sm" action="{{ route('admin.occupation.store') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="mb-3 row">
              <label for="name" class="col-sm-2 col-form-label" style="font-size: 1rem">企業名</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"><!--old第二引数はデフォルト値-->
                @if ($errors->any())
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li style="color:red;">{{$error}}</li>
                    @endforeach
                  </ul>
                @endif
                <small class="form-text text-muted"></small>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="name" class="col-sm-2 col-form-label" style="font-size: 1rem">メールアドレス</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"><!--old第二引数はデフォルト値-->
                @if ($errors->any())
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li style="color:red;">{{$error}}</li>
                    @endforeach
                  </ul>
                @endif
                <small class="form-text text-muted"></small>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="name" class="col-sm-2 col-form-label" style="font-size: 1rem">パスワード</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"><!--old第二引数はデフォルト値-->
                @if ($errors->any())
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li style="color:red;">{{$error}}</li>
                    @endforeach
                  </ul>
                @endif
                <small class="form-text text-muted"></small>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="name" class="col-sm-2 col-form-label" style="font-size: 1rem">住所</label>
              <div class="col-sm-10">
                <select class="custom-select col-sm-4" id="select-pref">
                  <option selected>都道府県を選択してください</option>
                </select>
                <select class="custom-select col-sm-4" id="select-city">
                  <option selected>市区町村を選択してください</option>
                </select>
                @if ($errors->any())
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li style="color:red;">{{$error}}</li>
                    @endforeach
                  </ul>
                @endif
                <small class="form-text text-muted"></small>
              </div>
            </div>
            <a href="{{ route('admin.occupation.index') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">保存</button>
          </div>
        </form>
      </main>
    </div>
  </div>
  @php
    $url = asset('data/pref_city.json'); //url
  @endphp
  {{--jqueryはlayouts.appで読み込み済み--}}
  <script type="module">
    var url = @json($url);//laravelの変数を取得
    // 都道府県フォーム生成
    $(function() {
      $.getJSON(url, function(data) {
        for(var i=1; i<48; i++) {
          var code = ('00'+ i ).slice(-2); //sliceで2桁にする ゼロパディング: 書式の桁数に満たない数値の場合に、足りない桁数だけ 0 を追加して桁数を合わせることです。たとえば3桁で1を表す場合、足りない2桁をゼロで埋めて 001 と表記します。
          // console.log(code);
          // console.log(data[i-1][code].pref);
          $('#select-pref').append('<option value="'+code+'">'+data[i-1][code].pref+'</option>'); //県を表示
        }
      });
    });

    // 都道府県メニューに連動した市区町村フォーム生成
    $('#select-pref').on('change', function() {
      $('#select-city option:nth-child(n+2)').remove(); // ※1 市区町村フォームクリア
        var select_pref = ('00'+$('#select-pref option:selected').val()).slice(-2);//2桁に合わせて県のコードを取得
        // console.log(select_pref);01
        var key = Number(select_pref) - 1;
        //0
        $.getJSON(url, function(data) {
          for(var i = 0; i < data[key][select_pref].city.length; i++){
            $('#select-city').append('<option value="'+data[key][select_pref].city[i].id+'">'+data[key][select_pref].city[i].name+'</option>');
          }
      });
    });
  </script>
  @component('components.admin.feather')
  @endcomponent
@endsection
