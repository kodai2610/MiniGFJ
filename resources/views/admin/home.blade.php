@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
      <div class="row">
        @component('components.sidebar')
        @endcomponent
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">ダッシュボード</h1>
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
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>見出し</th>
                  <th>見出し</th>
                  <th>見出し</th>
                  <th>見出し</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>あお</td>
                  <td>交</td>
                  <td>小</td>
                  <td>記</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>いね</td>
                  <td>鋼</td>
                  <td>省</td>
                  <td>黄</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>うた</td>
                  <td>抗</td>
                  <td>商</td>
                  <td>木</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>えま</td>
                  <td>工</td>
                  <td>匠</td>
                  <td>規</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>おか</td>
                  <td>項</td>
                  <td>生</td>
                  <td>機</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>かさ</td>
                  <td>孔</td>
                  <td>章</td>
                  <td>期</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>きじ</td>
                  <td>構</td>
                  <td>証</td>
                  <td>既</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>くり</td>
                  <td>高</td>
                  <td>章</td>
                  <td>気</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>けち</td>
                  <td>孝</td>
                  <td>少</td>
                  <td>基</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>こま</td>
                  <td>功</td>
                  <td>将</td>
                  <td>貴</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>さら</td>
                  <td>公</td>
                  <td>招</td>
                  <td>着</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>しか</td>
                  <td>甲</td>
                  <td>庄</td>
                  <td>樹</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>すぎ</td>
                  <td>候</td>
                  <td>性</td>
                  <td>来</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>せみ</td>
                  <td>考</td>
                  <td>頌</td>
                  <td>奇</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>そと</td>
                  <td>講</td>
                  <td>勝</td>
                  <td>器</td>
                </tr>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
@endsection

