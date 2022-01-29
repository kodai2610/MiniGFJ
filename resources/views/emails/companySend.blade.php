<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
<p>システムから応募が有りました。</p>

<p>ご確認の上、ご連絡をお願い致します。<br>
下記の内容でご応募をいただいています。</p>

==========================
<div>
<dl>
  <dt>お名前：</dt>
  <dd>{{ $name }}</dd>
</dl>
<dl>
  <dt>メールアドレス：</dt>
  <dd>{{ $email }}</dd>
</dl>
<dl>
  <dt>電話番号：</dt>
  <dd>{{ $tell }}</dd>
</dl>
<dl>
  <dt>年齢：</dt>
  <dd>{{ \Carbon\Carbon::parse($birth)->age }}才</dd>
</dl>
<dl>
  <dt>性別：</dt>
  <dd>
    @if($gender == 1)
      男性
    @elseif($gender == 2)
      女性
    @elseif ($gender === 0)
      未回答
    @endif
  </dd>
</dl>
<dl>
  <dt>応募求人：</dt>
  <dd>{{ $job }}</dd> 
</dl>
</div>
==========================
</body>
</html>