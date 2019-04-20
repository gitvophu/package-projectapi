<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('do-reset')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="">Mật khẩu mới</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    <input type="hidden" name="email" value="{{$email}}">
    </form>
</body>
</html>