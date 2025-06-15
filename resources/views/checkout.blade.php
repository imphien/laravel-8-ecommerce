<x-app-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    </x-slot>

    <x-slot name="js">
        <script src="{{ asset('js/checkout.js') }}" defer></script>
    </x-slot>

    <main class="_container">
        <div class="checkout_order">
            <div class="checkout">
                <h1>Thủ tục thanh toán</h1>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p style="color: red">{{ $error }}</p>
                    @endforeach
                @endif

                <form action="{{ route('checkout') }}" method="post">
                    @csrf
                    <h2>Chi tiết hoá đơn</h2>
                    <div class="form_group">
                        <label for="first_name">Họ</label>
                        <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="form_group">
                        <label for="last_name">Tên</label>
                        <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required>
                    </div>
                    <div class="form_group">
                        <label for="email">Địa chỉ Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form_group">
                        <label for="address">Địa chỉ nhà</label>
                        <input id="address" type="text" name="address_line" value="{{ old('address_line') }}" required>
                    </div>
                    <div class="two_form">
                        <div class="form_group">
                            <label for="city">Thành phố</label>
                            <input id="city" type="text" name="city" value="{{ old('city') }}" required>
                        </div>
                        <div class="form_group">
                            <label for="mobile">Số điện thoại</label>
                            <input id="mobile" type="text" name="mobile" value="{{ old('mobile') }}" required>
                        </div>
                    </div>
                    <h2>Chi tiết thanh toán</h2>
                    <input type="checkbox" name="cod" value="1" id="cod">
                    <label for="cod">Thanh toán khi nhận hàng</label>

                    <button type="submit">Đặt ngay bây giờ</button>
                </form>
            </div>

            <div class="order">
                @php
                    $originalTotal = $originalTotal ?? 0;
                    $discount = $discount ?? 0;
                    $shippingFee = 0;
                    $tax = 0;
                    $subTotal = $originalTotal - $discount;
                    $total = $subTotal + $shippingFee + $tax;
                @endphp

                <div class="card">
                    <h2>Đơn hàng của bạn</h2>

                    <div class="flex_align">
                        <strong>Tiền hàng</strong>
                        <span>{{ number_format($originalTotal, 0, ',', '.') }} VNĐ</span>
                    </div>

                    <div class="flex_align">
                        <strong>Giảm giá</strong>
                        <span>-{{ number_format($discount, 0, ',', '.') }} VNĐ</span>
                    </div>

                    <div class="flex_align">
                        <strong>Thuế</strong>
                        <span>{{ number_format($tax, 0, ',', '.') }} VNĐ</span>
                    </div>

                    <div class="flex_align">
                        <strong>Phí vận chuyển</strong>
                        <span>{{ number_format($shippingFee, 0, ',', '.') }} VNĐ</span>
                    </div>

                    <div class="flex_align">
                        <h3>Tổng cộng</h3>
                        <h3>{{ number_format($total, 0, ',', '.') }} VNĐ</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
