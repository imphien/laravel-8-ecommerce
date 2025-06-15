<x-app-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    </x-slot>

    {{--------------------- 
            $slot 
        --------------------}}

    <section class="hero">
        <div class="hero-inner">
            <h1 class="m-0">HIGHPICKS SPORT </h1>
            <h2 style="font-size: 20px">NƠI BẠN ĐẶT TRỌN NIỀM TIN</h2>
            <a class="d-b" href="{{ route('shop') }}" style="font-size: 10px">Mua ngay</a>
        </div>
    </section>
    <section class="featured-products _container">
        <h2 style="font-family: 'Roboto', sans-serif;">Sản phẩm nổi bật | SALE</h2>
        <div class="home-grid">
            @each('components.product', $products, 'product')
        </div>
        <a href="{{ route('shop') }}" class="cta">Xem thêm sản phẩm</a>
    </section>
    <section class="categories _container">
        <h2 style="font-family: 'Roboto', sans-serif;">Tên | Danh mục sản phẩm </h2>
        <div class="home-grid">
            @each('components.category', $categories, 'cate')
        </div>
    </section>

    {{--------------------- 
            $slot 
        --------------------}}
</x-app-layout>
