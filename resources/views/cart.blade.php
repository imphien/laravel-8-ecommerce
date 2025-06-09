<x-app-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    </x-slot>

    <x-slot name="js">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                function updateCartTotals() {
                    let total = 0;
                    document.querySelectorAll('.productTotal').forEach(el => {
                        let value = parseInt(el.textContent.replace(/[^\d]/g, '')) || 0;
                        total += value;
                    });

                    document.getElementById('subtotal').textContent = total.toLocaleString('vi-VN') + ' VNĐ';
                    document.getElementById('total').textContent = total.toLocaleString('vi-VN') + ' VNĐ';
                }

                window.updateQuantity = function (productId, input, isAuth) {
                    const quantity = input.value;
                    const row = input.closest('tr');
                    const priceEl = row.querySelector('.product-price');
                    const totalEl = row.querySelector('.productTotal');

                    const basePrice = parseInt(priceEl.dataset.price);
                    const discount = parseInt(priceEl.dataset.discount);
                    const discountedPrice = Math.round(basePrice * (1 - discount / 100));
                    totalEl.textContent = (discountedPrice * quantity).toLocaleString('vi-VN');

                    updateCartTotals();

                    if (isAuth) {
                        const form = row.querySelector('form[action*="uc"]');
                        form.action = form.action.replace(/quantity=\d+/, 'quantity=' + quantity);
                        form.submit();
                    } else {
                        // Handle guest cart update if needed
                    }
                };

                updateCartTotals();
            });

            function removeCart(el, productId, isAuth) {
                if (confirm("Bạn có chắc muốn xoá sản phẩm?")) {
                    const row = el.closest('tr');
                    row.remove();
                    document.dispatchEvent(new Event('DOMContentLoaded')); // Recalculate total

                    if (isAuth) {
                        const form = row.querySelector('form[action*="rfc"]');
                        if (form) form.submit();
                    } else {
                        // Handle guest cart removal if needed
                    }
                }
            }
        </script>
    </x-slot>

    <main class="_container">
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
                    @php
                        $hasDiscount = $product->discount > 0;
                        $discountedPrice = $hasDiscount
                            ? $product->price * (1 - $product->discount / 100)
                            : $product->price;
                    @endphp
                    <tr>
                        <td>
                            <div class="product flex_align">
                                <img class="d-b" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}">
                                <div class="details">
                                    <a href="{{ route('product', ['product' => $product->id]) }}" class="m-0">
                                        {{ ucfirst($product->title) }}
                                    </a>
                                    <p>
                                        Giá:
                                        <span class="product-price"
                                              data-price="{{ $product->price }}"
                                              data-discount="{{ $product->discount }}">
                                                @if ($hasDiscount)
                                                <span style="text-decoration: line-through; color: gray;">
                                                        {{ number_format($product->price) }} VNĐ
                                                    </span>
                                                <span style="color: red; font-weight: bold; margin-left: 8px;">
                                                        {{ number_format($discountedPrice) }} VNĐ
                                                    </span>
                                            @else
                                                {{ number_format($product->price) }} VNĐ
                                            @endif
                                            </span>
                                    </p>
                                    @auth
                                        <form action="{{ route('rfc', ['product' => $product->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endauth
                                    <a onclick="removeCart(this, {{ $product->id }}, {{ auth()->check() ? 'true' : 'false' }})" class="remove" href="#">Xoá sản phẩm</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            @auth
                                <form action="{{ route('uc', ['product' => $product->id, 'quantity' => $product->quantity]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                </form>
                            @endauth
                            <input type="number"
                                   min="1"
                                   max="20"
                                   onchange="updateQuantity({{ $product->id }}, this, {{ auth()->check() ? 'true' : 'false' }})"
                                   value="{{ $product->quantity }}">
                        </td>
                        <td class="productTotal">
                            {{ number_format($discountedPrice * $product->quantity) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <table class="subtotal-table ml-auto">
                <tr>
                    <td>Tiền sản phẩm</td>
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
            <div style="display: grid; place-items: center; padding: 2rem 0">
                <img style="max-width: 100%;" src="{{ asset('img/cart-empty.png') }}" alt="">
            </div>
        @endif
    </main>

    <x-modal title="Xoá sản phẩm" ok="Xoá">
        <x-slot name="description">
            Bạn có chắc là xoá sản phẩm ?
        </x-slot>
    </x-modal>
</x-app-layout>
