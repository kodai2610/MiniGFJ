<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>


<body>
<p>※このメールはシステムからの自動返信です</p>

<p>{{ $company }}への応募ありがとうございます。</p> 

<p>以下の内容でご応募を受け付けいたしました。<br>
担当者よりご連絡いたしますので<br>
今しばらくお待ちくださいませ。</p>
==========================
<div>
<dl>
  <dt>お名前：</dt>
  <dd>{{ $name }}</dd>
</dl>
<dl>
  <dt>お名前（カタカナ）：</dt>
  <dd>{{ $ruby }}</dd>
</dl>
<dl>
  <dt>メールアドレス：</dt>
  <dd>{{ $email }}</dd>
</dl>
<dl>
  <dt>電話番号</dt>
  <dd>{{ $tell }}</dd>
</dl>
<dl>
  <dt>生年月日：</dt>
  <dd>{{ $birth }}</dd>
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



