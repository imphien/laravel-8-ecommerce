<header>
    <nav class="flex_align _container">
        <div style="margin-right: auto;">
            <a class="logo-link d-b" href="{{ route('home') }}">
                <img class="d-b" src="{{ asset('img/logo_pickleball.png') }}" alt="logo">
            </a>
        </div>
        <a class="ml-auto" href="{{ route('new') }}">Giới thiệu</a>
        <a class="ml-auto" href="{{ route('contact') }}">Liên hệ</a>
        <li style="position: relative; list-style: none;"
            onmouseover="this.querySelector('.dropdown-menu').style.display='flex'"
            onmouseout="this.querySelector('.dropdown-menu').style.display='none'">

            <a href="{{ route('shop') }}"
               style="padding: 10px 16px; display: inline-block; color: white; font-weight: bold; text-decoration: none;">
                Sản phẩm
            </a>

            <ul class="dropdown-menu"
                style="
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            width: 440px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: none;
            z-index: 1000;
            padding: 0;
            margin: 0;
            list-style: none;
            flex-wrap: wrap;
        ">

                @foreach ($categories as $category)
                    <li style="width: 50%; padding: 12px; box-sizing: border-box; list-style: none;">
                        <a href="{{ route('shop', ['category' => $category->id]) }}"
                           style="
                        display: flex;
                        align-items: center;
                        gap: 12px;
                        text-decoration: none;
                        color: #1F2937;
                        background-color: #f9f9f9;
                        padding: 8px;
                        border-radius: 4px;
                        transition: background-color 0.2s ease;
                    "
                           onmouseover="this.style.backgroundColor='#f0f0f0'"
                           onmouseout="this.style.backgroundColor='#f9f9f9'">

                            <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('img/default-category.png') }}"
                                 alt="{{ $category->title }}"
                                 style="width: 50px; height: 50px; object-fit: contain; border-radius: 4px;">

                            <div style="display: flex; flex-direction: column; line-height: 1.2;">
                        <span style="font-weight: bold; font-size: 14px;">
                            {{ strtoupper($category->title) }}
                        </span>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
        </li>
        <form class="ml-auto one-form" action="{{ route('shop') }}" method="GET">
            <input type="search" name="search" placeholder="Tìm kiếm sản phẩm..." value="{{ $search ?? '' }}">
            <button type="submit">
                <i class="material-icons">search</i>
            </button>
        </form>
        <ul class="flex_align">
            <li>
            @if (!auth()->check())
                <a style="width: 5rem" class="logo-link d-b" href="{{ route('login') }}">
                Đăng nhập
                </a>
            @endif
            </li>
            <li class="space-lr">
                <a class="notification-link" href="{{ route('cart') }}">
                    <span class="material-icons">shopping_cart</span>
                    @auth
                        @if ($product_count = auth()->user()->carts()->firstOrCreate(['status' => 'N'])->products->sum('pivot.quantity'))
                            <span class='badge'>{{ $product_count }}</span>
                        @endif
                    @endauth
                    @guest
                        @if(request()->cookie('products') && $product_count = array_sum(json_decode(request()->cookie('products'), true)))
                            <span class='badge'>{{ $product_count }}</span>
                        @endif
                    @endguest

                </a>
            </li>
            @if (auth()->check())
                <li>
                    <a href="{{ route('user.profile') }}">
                        <span class="material-icons" style="color: white">
                            person
                        </span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</header>
