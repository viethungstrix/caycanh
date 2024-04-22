<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Xe+83m130xy9N29aaktH6uQz37xf6F6y416D5+V+3m005K53ow85373q2e9+h" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Đăng nhập</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember"> Nhớ mật khẩu
            </div>

            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            <a href="{{ route('login')}}">Đã có tài khoản? Đăng nhập tại đây</a>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
            @endif
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-duo8z7zB3433j8YrgBBb58oT3f2007s5Vj302AR2H4Sn49v3D3p/X1n8o375m0" crossorigin="anonymous"></script>
</body>
</html>
