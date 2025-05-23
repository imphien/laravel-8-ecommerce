<x-app-layout>
    <x-slot name="style">
        {{-- <link rel="stylesheet" href="{{ asset('css/product.css') }}"> --}}
    </x-slot>
    {{--------------------- 
            $slot 
        --------------------}}
        <style>
            main{
                font-family: 'Roboto', sans-serif;
                display: grid;
                place-items: center;
                padding: 2rem 0;
            }
            main a{
                color: var(--site_col_1);
                text-decoration: underline
            }
        </style>
        <section>
            <main class="_container">
                <span style="font-size: 10rem" class="material-icons">done</span>
                <h1>Cảm ơn bạn đã đặt hàng</h1>
                <p>Bạn đã đặt hàng thành công <a href="{{ route('user.orders.index')}}">Xem chi tiết đơn đặt hàng</a></p>
            </main>
        </section>

    {{--------------------- 
        $slot 
    --------------------}}
</x-app-layout>