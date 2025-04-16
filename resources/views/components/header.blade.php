<header>
    <nav class="flex_align _container">
        <a class="logo-link d-b" href="{{ route('home') }}"><img class="d-b" src="{{ asset('img/logo_pickleball.svg') }}" alt="logo"></a>
        <a class="ml-auto" href="{{ route('new') }}">Giới thiệu</a>
        <a class="ml-auto" href="{{ route('contact') }}">Liên hệ</a>
        <form class="ml-auto one-form" action="{{ route('shop') }}" method="GET">
            <input type="search" name="search" placeholder="Tìm kiếm sản phẩm..." value="{{ $search ?? '' }}">
            <button type="submit">
                <i class="material-icons">search</i>
            </button>
        </form>
        <ul class="flex_align">
            <li>
            @if (!auth()->check())
                <a style="width: 2rem" class="logo-link d-b" href="{{ route('login') }}">
                Login
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
                        {{-- if product is set and is not 0 --}}
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
