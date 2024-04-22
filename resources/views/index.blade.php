<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng cây cảnh</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B4dnZNMLy8b1NEq7YiGd5uW1nR9j3hjB5qmgOpL2rQ+t/tZ0bOIu4w6d2ZzQkYQ" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cửa hàng cây cảnh</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cây cảnh</a></li>
                            <li><a class="dropdown-item" href="#">Chậu cảnh</a></li>
                            <li><a class="dropdown-item" href="#">Phụ kiện</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                </ul>

                @if (Auth::check())
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Xin chào, {{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('social.login.google') }}">Đăng nhập bằng Gmail</a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <h1>Danh sách sản phẩm</h1>
        <div class="row">
            @isset($plants)
                @forelse ($plants as $plant)
                    <tr>
                        <td>{{ $plant->id }}</td>
                        <td>{{ $plant->name }}</td>
                        <td>{{ $plant->description }}</td>
                        <td><img src="{{ $plant->image }}" width="100px"></td>
                        <td>{{ $plant->price }}</td>
                        <td>{{ $plant->quantity }}</td>
                        <td>
                            <a href="{{ route('plants.show', $plant) }}">Xem</a> |
                            <a href="{{ route('plants.edit', $plant) }}">Sửa</a> |
                            <form action="{{ route('plants.destroy', $plant) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <p>Không có cây nào</p>
                @endforelse
            @endisset
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrB4Q5rYojTPhwnV5m7KeegIXQl635fmT/VtFHR3q705x459q4oFz8014i5qQ" crossorigin="anonymous"></script>
</body>
</html>
