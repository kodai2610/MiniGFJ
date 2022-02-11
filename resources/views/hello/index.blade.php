<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <p>{{ $msg }}</p>
  @if (count($errors) > 0)
  <p>入力に問題があります。再入力して下さい。</p>
  @endif
  <form action="/hello" method="post">  
        <table>
            @csrf
            @if ($errors->has('msg'))
            <tr><th>ERROR</th><td>{{ $errors->first('msg') }}</td></tr>
            @endif
            <tr>
                <th>Message: </th>
                <td><input type="text" name="msg" id="" value="{{ old('msg') }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
</body>
</html>