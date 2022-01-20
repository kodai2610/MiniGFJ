@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('form.register.title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.register') }}">
                        @csrf

                        {{--name--}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('form.register.name') }}</label>
                            <!--言語ファイルから翻訳文字列の取得を取得するヘルパ関数-->
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--ruby--}}
                        <div class="form-group row">
                            <label for="ruby" class="col-md-4 col-form-label text-md-right">{{ __('form.register.ruby') }}</label>
                            <!--言語ファイルから翻訳文字列の取得を取得するヘルパ関数-->
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('ruby') is-invalid @enderror" name="ruby" value="{{ old('ruby') }}" autocomplete="ruby" autofocus>
                                @error('ruby')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--email--}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('form.register.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--password--}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('form.register.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--passwordcheck--}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('form.register.passwordConfirm') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        {{--tell--}}
                        <div class="form-group row">
                            <label for="tell" class="col-md-4 col-form-label text-md-right">{{ __('form.register.tell') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('tell') is-invalid @enderror" name="tell" value="{{old('tell')}}">
                                @error('tell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--birthday--}}
                        <div class="form-group row">
                            <label for="birth_day" class="col-md-4 col-form-label text-md-right">{{ __('form.register.birthday') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="birth_day" class="form-control @error('birth_day') is-invalid @enderror" name="birth_day" value="{{ old('birth_day') }}" autocomplete="birth_day">

                                @error('birth_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--gender--}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('form.register.gender') }}</label>
                            <div class="col-md-6" style="padding-top: calc(0.375rem + 1px);">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="1">
                                    <label class="form-check-label" for="inlineRadio1">男性</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="2">
                                    <label class="form-check-label" for="inlineRadio2">女性</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="0">
                                    <label class="form-check-label" for="inlineRadio3">無回答</label>
                                </div>
                                
                            </div>
                        </div>

                        {{--address--}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('form.register.address') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select col-sm-10 @error('prefecture_id') is-invalid @enderror" id="select-pref" name="prefecture_id">
                                <option value="">都道府県を選択してください</option>
                                @foreach ($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}" @if(old('prefecture_id') == $prefecture->id) selected @endif>{{ $prefecture->name }}</option>
                                @endforeach
                                </select>
                                <select class="custom-select col-sm-10 mt-1 @error('city_id') is-invalid @enderror" id="select-city" name="city_id">
                                <option value="">市区町村を選択してください</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('form.register.btn') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="module">
    const cityId = '{{old("city_id")}}';
    
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
