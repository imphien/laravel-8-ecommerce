<x-app-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    </x-slot>

    <x-slot name="js">
        <script src="{{ asset('js/checkout.js') }}" defer></script>
    </x-slot>
    {{--------------------- 
            $slot 
        --------------------}}
            <main  class="_container">
                <div class="checkout_order">
                    <div class="checkout">
                        <h1>Thủ tục thanh toán</h1>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <p style="color: red">{{ $error }}</p>
                            @endforeach
                        @else
                            <strong style="cursor: pointer;" onclick="fillForm(this)">Điền thông tin thanh toán -></strong>
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
                                    <label for="postal_code">Mã code</label>
                                    <input id="postal_code" type="text" name="postal_code" value="{{ old('postal_code') }}" required>
                                </div>
                            </div>
                            <div class="two_form">
                                <div class="form_group">
                                    <label for="country">Nước</label>
                                    <input id="country" type="text" name="country" value="{{ old('country') }}" required>
                                </div>
                                <div class="form_group">
                                    <label for="mobile">Số điện thoại</label>
                                    <input id="mobile" type="text" name="mobile" value="{{ old('mobile') }}" required>
                                </div>
                            </div>
                            <h2>Chi tiết thanh toán</h2>
                            <input type="checkbox" name="cod" value="1" id="cod">
                            <label for="cod">Thanh toán khi nhận hàng </label>

                            <button type="submit">Đặt ngay bây giờ</button>
                        </form>

                    </div>
                    <div class="order">
                        <div class="card">
                            <h2>Đơn hàng của bạn</h2>
                            <div class="flex_align">
                                <strong>Tiền hàng</strong>
                                <span>{{ $subTotal }}VNĐ</span>
                            </div>
                            <div class="flex_align">
                                <strong>Giảm giá</strong>
                                <span>0VNĐ</span>
                            </div>
                            <div class="flex_align">
                                <strong>Thuế</strong>
                                <span>0VNĐ</span>
                            </div>
                            <div class="flex_align">
                                <strong>Phí vận chuyển</strong>
                                <span>0</span>
                            </div>
                            <div class="flex_align">
                                <h3>Tổng phí vận chuyển</h3>
                                <h3>{{ $subTotal }}VNĐ</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
    {{--------------------- 
        $slot 
    --------------------}}
</x-app-layout>