<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- styleSheets -->
    <link rel="stylesheet" href="{{ asset('css/admin/utilities.css') }}">
        {{ $style }}

    <link rel="shortcut icon" href="{{ asset('img/logo_1.png') }}" />
    <title>Thuốc bắc Đỗ Gia</title>

    <!-- scripts -->
    <script src="{{ asset('js/admin/utilities.js') }}" defer></script>
    {{ $js ?? '' }}

    {{ $chart ?? '' }}

    <style>
        a[href = "{{ url()->current() }}"]{
            color: var(--text-blue);
        }
    </style>
</head>
<body class="m-0">
    <div class="cover"></div>


    <nav>
        <span class="ham material-icons">menu</span>
        <a id="nav_logo" class="d-b" href="#"><img class="fit_img" src="{{ asset('img/logo_1.png') }}" alt="logo"></a>
        <div class="nav_admin">
            <img class="fit_img admin_img" src="{{ asset('storage/avatar/admin.jpg'); }}" alt="admin_img">
        </div>
    </nav>


    <aside>
        <div id="aside_logo">
            <a class="d-b" href="#"><img class="fit_img" src="{{ asset('img/logo_1.png') }}" alt="logo"></a>
        </div>
        <div id="aside_admin">
            <div class="card flex_align">
                <img class="fit_img admin_img" src="{{ asset('storage/avatar/admin.jpg'); }}" alt="admin_img">
                <div>
                    <h6>{{ auth()->user()->full_name }}</h6>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input class="logout" type="submit" value="Đăng xuất">
                    </form>
                </div>
            </div>
        </div>
        <div class="aside_main">
            <ul>
                <li>Tổng quan</li>
                <!-- <ul>
                    <li class="list_item">
                        <a class="flex_align" href="{{ route('admin.transactions.index') }}">
                            <span class="material-icons">paid</span>
                            <!-- <div>Transactions</div> -->
                        </a>
                    </li>
                    <li class="list_item">
                        <a class="flex_align" href="{{ route('admin.account') }}">
                            <span class="material-icons">person</span>
                            <div>Tài khoản</div>
                        </a>
                    </li>
                </ul> -->
            </ul>
            <ul style="margin: 1.5rem 0;">
                <li>Quản lý</li>
                <ul style="margin-bottom: 5rem">
                    <li class="list_item">
                        <a class="flex_align" href="{{ route('admin.customers') }}">
                            <span class="material-icons">people</span>
                            <div>Khách hàng</div>
                        </a>
                    </li>
                    <li class="list_item has-sub">
                        <a class="flex_align" href="#">
                            <span class="material-icons">shopping_bag</span>
                            <div>Sản phẩm</div>
                            <span class="arrow material-icons">arrow_drop_down</span>
                        </a>
                        <div class="products sub">
                            <a href="{{ route('admin.products.index') }}">Danh sách</a>
                            <a href="{{ route('admin.products.create') }}">Tạo mới</a>
                        </div>
                    </li>
                    <li class="list_item has-sub">
                        <a class="flex_align" href="#">
                            <span class="material-icons">category</span>
                            <div>Danh mục </div>
                            <span class="arrow material-icons">arrow_drop_down</span>
                        </a>
                        <div class="categories sub">
                            <a href="{{ route('admin.categories.index') }}">Danh sách</a>
                            <a href="{{ route('admin.categories.create') }}">Tạo mới</a>
                        </div>
                    </li>
                    <li class="list_item">
                        <a class="flex_align" href="{{ route('admin.orders.index') }}">
                            <span class="material-icons">shopping_cart</span>
                            <div>Đơn hàng</div>
                        </a>
                    </li>
                </ul>
            </ul>
        </div>
    </aside>
    <main>
        {{-- main contents --}}
        {{ $slot }}
        {{-- main contents --}}
    </main>
</body>
</html>
