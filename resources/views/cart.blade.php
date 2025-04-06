<x-app-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    </x-slot>

    <x-slot name="js">
        <script src="{{ asset('js/cart.js') }}" defer></script>
    </x-slot>
    {{--------------------- 
            $slot 
        --------------------}}
            <main  class="_container">
                @if (count($products))
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)    
                            <tr>
                                <td>
                                    <div class="product flex_align">
                                        <img class="d-b" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}">
                                        <div class="details">
                                            <a href="{{route('product', ['product' => $product->id])}}" class="m-0">{{ ucfirst($product->title) }}</a>
                                            <p>Giá: {{$product->price}}VNĐ </p>
                                            @auth
                                                <form action="{{ route('rfc', ['product' => $product->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endauth
                                            <a onclick="removeCart(this, {{$product->id}}, {{ auth()->check() }})" class="remove" href="#">Xoá sản phẩm</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @auth
                                        <form action="{{ route('uc', ['product' => $product->id, 'quantity' => 0]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                    @endauth
                                    <input type="number" min="1" max="20" onchange="updateQuantity({{$product->id}}, this, {{auth()->check()}})" value="{{$product->quantity}}">
                                </td>
                                <td  class="productTotal">{{$product->price*$product->quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="subtotal-table ml-auto">
                    <tr>
                        <td> Tiền sản phẩm</td>
                        <td id="subtotal"></td>
                    </tr>
                    <tr>
                        <td>Thuế</td>
                        <td>0 VNĐ</td>
                    </tr>
                    <tr>
                        <td>Tổng thanh toán</td>
                        <td id="total"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="checkout">
                                <a href="{{ route('checkout') }}">Tiến hành kiểm tra thanh toán</a>
                            </div>
                        </td>
                    </tr>
                </table>
                @else
                    <div style="display: grid;place-items:center;padding:2rem 0">
                        <img style="max-width: 100%;" src="{{ asset('img/cart-empty.png') }}" alt="">
                    </div>
                @endif
            </main>
            <x-modal title="Xoá sản phẩm" ok="Xoá">
                <x-slot name="description">
                    Bạn có chắc là xoá sản phẩm ?
                </x-slot>
            </x-modal>
    {{--------------------- 
        $slot 
    --------------------}}
</x-app-layout>