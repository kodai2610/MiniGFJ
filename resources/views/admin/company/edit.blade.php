@extends('layouts.admin.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.admin.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">企業編集</h1>
        </div>
        <form class="card w-100 shadow-sm" action="{{ route('admin.company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
            {{-- name --}}
            <div class="mb-3 row">
              <label for="name" class="col-sm-2 col-form-label required" style="font-size: 1rem">企業名</label>
              <div class="col-sm-6">
                <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}">
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('name'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('name') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- email --}}
            <div class="mb-3 row">
              <label for="email" class="col-sm-2 col-form-label required" style="font-size: 1rem">メールアドレス</label>
              <div class="col-sm-6">
                <input type="text" name="email" class="form-control" value="{{ old('email', $company->email) }}">
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('email'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('email') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- password --}}
            <div class="mb-3 row">
              <label for="password" class="col-sm-2 col-form-label required" style="font-size: 1rem">パスワード</label>
              <div class="col-sm-6">
                <input type="password" name="password" class="form-control">
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('password'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('password') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- password_confirmation --}}
            <div class="mb-3 row">
              <label for="password_confirmation" class="col-sm-2 col-form-label required" style="font-size: 1rem">パスワード確認用</label>
              <div class="col-sm-6">
                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
              </div>
            </div>
            {{-- industry --}}
            <div class="mb-3 row">
              <label for="industry_id" class="col-sm-2 col-form-label required" style="font-size: 1rem">業界</label>
              <div class="col-sm-3">
                <select class="form-control" name="industry_id">
                  @foreach ($industries as $industry)
                    <option value="{{ $industry->id }}" @if(old('indstry_id', $company->industry->id) == $industry->id) selected @endif>{{ $industry->name }}</option>
                  @endforeach
                </select>
                @if ($errors->has('industry_id'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('industrt_id') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- pref,city --}}
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label required" style="font-size: 1rem">本社所在地</label>
              <div class="col-sm-10">
                <select class="custom-select col-sm-4" id="select-pref" name="prefecture_id">
                  <option value="">都道府県を選択してください</option>
                  @foreach ($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}" @if(old('prefecture_id', $company->prefecture->id) == $prefecture->id) selected @endif>{{ $prefecture->name }}</option>
                  @endforeach
                </select>
                <select class="custom-select col-sm-4" id="select-city" name="city_id">
                  <option value="">市区町村を選択してください</option>
                </select>
                @if ($errors->has('industry_id') || $errors->has('city_id'))
                  <ul>
                    <li style="color:red;">この値は必ず指定してください。</li>
                  </ul>
                @endif
                <small class="form-text text-muted"></small>
              </div>
            </div>
            {{-- ceo --}}
            <div class="mb-3 row">
              <label for="ceo" class="col-sm-2 col-form-label required" style="font-size: 1rem">代表者名</label>
              <div class="col-sm-6">
                <input type="text" name="ceo" class="form-control" value="{{ old('ceo', $company->ceo) }}">
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('ceo'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('ceo')}}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- ホームペ --}}
            <div class="mb-3 row">
              <label for="url" class="col-sm-2 col-form-label required" style="font-size: 1rem">企業HP</label>
              <div class="col-sm-6">
                <input type="text" name="url" class="form-control" value="{{ old('url', $company->url) }}">
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('url'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('url')}}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- 資本金 --}}
            <div class="row mb-3">
              <label for="capital" class="col-sm-2 col-form-label" style="font-size: 1rem">資本金</label>
              <div class="col-sm-3">
                <div class="input-group">
                  <input type="number" name="capital" value="{{ old('capital', $company->capital) }}" class="form-control" aria-describedby="inputGroupAppend" placeholder="資本金">
                  <div class="input-group-append">
                    <span class="input-group-text" id="inputGroupAppend">円</span>
                  </div>
                </div>
              </div>
            </div>
            {{-- ロゴ画像 --}}
            <div class="mb-3 row">
              <label for="logo" class="col-sm-2 col-form-label required" style="font-size: 1rem">ロゴ画像</label>
              <div class="col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="logo">
                  <label class="custom-file-label" for="customFile">
                    @if (!empty($company->logo))
                      {{ $company->logo }}
                    @else 
                      Choose file
                    @endif
                </label>
                </div>
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('logo'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('logo')}}</li>
                  </ul>
                @endif
                <small class="form-text text-muted"></small>
              </div>
            </div>
            {{-- staff_name --}}
            <div class="mb-3 row">
              <label for="staff_name" class="col-sm-2 col-form-label required" style="font-size: 1rem">ご担当者名</label>
              <div class="col-sm-6">
                <input type="text" name="staff_name" class="form-control" value="{{ old('staff_name', $company->staff_name) }}">
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('staff_name'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('staff_name')}}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- staff_email --}}
            <div class="mb-3 row">
              <label for="staff_email" class="col-sm-2 col-form-label required" style="font-size: 1rem">ご担当者メールアドレス</label>
              <div class="col-sm-6">
                <input type="text" name="staff_email" class="form-control" value="{{ old('staff_email', $company->staff_email) }}">
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('staff_email'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('staff_email')}}</li>
                  </ul>
                @endif
              </div>
            </div>
            <a href="{{ route('admin.company.index') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">保存</button>
          </div>
        </form>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js" type="module"></script>
  <script type="module">
    //bsCustomFileInput
    bsCustomFileInput.init();

    const prefecureId = '{{ old("prefecture_id", $company->prefecture->id) }}';
    const cityId = '{{old("city_id", $company->city->id)}}';
    //ajax:JavaScriptとXMLを使ったサーバーとの通信
    //非同期通信:非同期通信とは、リクエストを出してからデータが返って来る前の処理を、ブラウザ上で行い、更新した部分だけをリクエストして処理を行う、という通信
    //jqueryのajax
    function setCities(prefectureId, cityId = null) { //cityId:渡されないor undefinedの時 nullとして初期化
      $.ajax({
          url: '/get-cities', //URLまたはディレクトリを記載
          type: 'GET', //内容を書き換える場合はPOST
          data: {
            'prefecture_id': prefectureId //アクセスするときに必要なデータを記載
          }
        })
        // Ajaxリクエストが成功した時発動
        .done((data) => {
          $('#select-city').empty();
          $('#select-city').append('<option value="" selected>市区町村を選択してください</option>');
          // console.log(data);
          $.each(data, function(i, e) { //i:index, e:object
            if (e.id == cityId) { //選択済みだったら
              $('#select-city').append('<option value="' + e.id + '" selected>' + e.name + '</option>');
            } else {
              $('#select-city').append('<option value=' + e.id + '>' + e.name + '</option>');
            }
          });
        })

        // Ajaxリクエストが失敗した時発動
        .fail((data) => {
          alert('error');
        })
    }

    if(prefecureId && cityId) {
      setCities(prefecureId,cityId);
    }

    $('#select-pref').off('change').on('change', function() {
      const val = $(this).val(); //select-prefのprefecture_idが入る
      setCities(val,cityId);
    });
  </script>
@endsection

