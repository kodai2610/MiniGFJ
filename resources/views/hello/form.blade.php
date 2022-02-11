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
    <form action="/hello" method="post">
        <table>
            @csrf
            @error('name')
                <tr>
                    <th>ERROR</th>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>name: </th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>
            @error('mail')
                <tr>
                    <th>ERROR</th>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>mail: </th>
                <td><input type="text" name="mail" value="{{ old('mail') }}"></td>
            </tr>
            @error('age')
                <tr>
                    <th>ERROR</th>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>age: </th>
                <td><input type="text" name="age" value="{{ old('age') }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
</body>
</html>