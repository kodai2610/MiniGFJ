@extends('layouts.company.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @component('components.company.sidebar')
      @endcomponent
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">求人編集</h1>
        </div>
        <form class="card w-100 shadow-sm" action="{{ route('company.job.update',$job->id) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="card-body">
            {{-- title --}}
            <div class="mb-3 row">
              <label for="title" class="col-sm-2 col-form-label required" style="font-size: 1rem">タイトル</label>
              <div class="col-sm-6">
                <input type="text" name="title" class="form-control" value="{{ old('title', $job->title) }}">
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('title'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('title') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- display_message --}}
            <div class="mb-3 row">
              <label for="display_message" class="col-sm-2 col-form-label required" style="font-size: 1rem">メッセージ</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="display_message">{{ old('display_message', $job->display_message) }}</textarea>
                {{-- <input type="text" name="display_message" class="form-control" value="{{ old('display_message') }}"> --}}
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('display_message'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('display_message') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- img --}}
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label" style="font-size: 1rem">イメージ画像</label>
              <div class="col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="img">
                  <label class="custom-file-label" for="customFile">
                    @if (!empty($job->img))
                      {{ $job->img }}
                    @else 
                      Choose file
                    @endif
                  </label>
                </div>
                <!--old第二引数はデフォルト値-->
                @if($errors->has('img'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('img') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- background --}}
            <div class="mb-3 row">
              <label for="background" class="col-sm-2 col-form-label" style="font-size: 1rem">募集背景</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="2" name="background">{{ old('background', $job->background) }}</textarea>
                {{-- <input type="text" name="display_message" class="form-control" value="{{ old('display_message') }}"> --}}
              </div>
            </div>
            {{-- occupation --}}
            <div class="mb-3 row">
              <label for="occupation_id" class="col-sm-2 col-form-label required" style="font-size: 1rem">募集職種</label>
              <div class="col-sm-3">
                <select class="form-control" name="occupation_id">
                  @foreach ($occupations as $occupation)
                    <option value="{{ $occupation->id }}" @if (old('occupation_id', $job->occupation->id) == $occupation->id) selected @endif>{{ $occupation->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            {{-- content --}}
            <div class="mb-3 row">
              <label for="content" class="col-sm-2 col-form-label required" style="font-size: 1rem">業務内容/詳細</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="content">{{ old('content', $job->content) }}</textarea>
                {{-- <input type="text" name="display_message" class="form-control" value="{{ old('display_message') }}"> --}}
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('content'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('content') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- employment_type --}}
            <div class="mb-3 row">
              <label for="" class="col-sm-2 col-form-label required" style="font-size: 1rem">雇用形態</label>
              <div class="col-sm-6">
                @foreach ($employmentTypes as $type)
                  <div class="form-check form-check-inline">
                    @if($job->empTypes->contains('id',$type->id)) {{--job_idをもつempTypesがあるか？--}}
                    <input class="form-check-input" type="checkbox" name="empTypes[]" value="{{ $type->id }}"
                      id="empType_{{ $type->id }}" checked>
                    @else 
                    <input class="form-check-input" type="checkbox" name="empTypes[]" value="{{ $type->id }}"
                      id="empType_{{ $type->id }}" >
                    @endif
                    <label class="form-check-label" for="empType_{{ $type->id }}">{{ $type->name }}</label>
                  </div>
                @endforeach
                @if ($errors->has('empTypes'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('empTypes') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- salary_type --}}
            <div class="mb-3 row">
              <label for="" class="col-sm-2 col-form-label required" style="font-size: 1rem">給与体系</label>
              <div class="col-sm-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('salary_type') is-invalid @enderror" type="radio" name="salary_type"
                    value="1" {{ old('salary_type',$job->salary_type) == 1 ? "checked" : "" }} >
                  <label class="form-check-label">月給</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('salary_type') is-invalid @enderror" type="radio" name="salary_type"
                    value="2" {{ old('salary_type',$job->salary_type) == 2 ? "checked" : "" }}>
                  <label class="form-check-label">時給</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('salary_type') is-invalid @enderror" type="radio" name="salary_type"
                    value="3" {{ old('salary_type',$job->salary_type) == 3 ? "checked" : "" }}>
                  <label class="form-check-label">日給</label>
                </div>
              </div>
            </div>
            {{-- salary--}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label required" style="font-size: 1rem">給与</label>
              <div class="col-sm-10" style="display:flex;align-items:center;padding-left:0;">
                <div class="input-group col-sm-3">
                  <input type="number" name="salary_min" value="{{ old('salary_min', $job->salary_min) }}" class="form-control"
                    aria-describedby="inputGroupAppend" placeholder="最低">
                  <div class="input-group-append">
                    <span class="input-group-text" id="inputGroupAppend">円</span>
                  </div>
                </div>
                ~
                <div class="input-group col-sm-3">
                  <input type="number" name="salary_max" value="{{ old('salary_max',$job->salary_max) }}" class="form-control"
                    aria-describedby="inputGroupAppend" placeholder="最高">
                  <div class="input-group-append">
                    <span class="input-group-text" id="inputGroupAppend">円</span>
                  </div>
                </div>
              </div>
            </div>
            {{-- location --}}
            <div class="mb-3 row">
              <label for="location" class="col-sm-2 col-form-label required" style="font-size: 1rem">勤務地</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="2" name="location">{{ old('location',$job->location) }}</textarea>
                {{-- <input type="text" name="display_message" class="form-control" value="{{ old('display_message') }}"> --}}
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('location'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('location') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- workhour --}}
            <div class="mb-3 row">
              <label for="work_hour" class="col-sm-2 col-form-label required" style="font-size: 1rem">勤務時間</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="2" name="work_hour">{{ old('work_hour',$job->work_hour) }}</textarea>
                {{-- <input type="text" name="display_message" class="form-control" value="{{ old('display_message') }}"> --}}
                <!--old第二引数はデフォルト値-->
                @if ($errors->has('work_hour'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('work_hour') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            {{-- dayoff --}}
            <div class="mb-3 row">
              <label for="day_off" class="col-sm-2 col-form-label" style="font-size: 1rem">休日/休暇</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="2" name="day_off">{{ old('day_off',$job->day_off) }}</textarea>
                {{-- <input type="text" name="display_message" class="form-control" value="{{ old('display_message') }}"> --}}
              </div>
            </div>
            {{-- license --}}
            <div class="mb-3 row">
              <label for="license" class="col-sm-2 col-form-label" style="font-size: 1rem">応募資格</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="2" name="license">{{ old('license',$job->license) }}</textarea>
                {{-- <input type="text" name="display_message" class="form-control" value="{{ old('display_message') }}"> --}}
              </div>
            </div>
            {{-- feature_type --}}
            <div class="mb-3 row">
              <label for="" class="col-sm-2 col-form-label required" style="font-size: 1rem">特徴</label>
              <div class="col-sm-6">
                @foreach ($features as $feature)
                  <div class="form-check form-check-inline">
                    @if($job->features->contains('id',$feature->id))
                    <input class="form-check-input" type="checkbox" name="feature_ids[]" value="{{ $feature->id }}" checked>
                    @else 
                    <input class="form-check-input" type="checkbox" name="feature_ids[]" value="{{ $feature->id }}">
                    @endif
                    <label class="form-check-label">{{ $feature->name }}</label>
                  </div>
                @endforeach
                @if ($errors->has('feature_ids'))
                  <ul>
                    <li style="color:red;">{{ $errors->first('feature_ids') }}</li>
                  </ul>
                @endif
              </div>
            </div>
            <a href="{{ route('company.job.index') }}" class="btn btn-secondary">戻る</a>
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
  </script>
@endsection
