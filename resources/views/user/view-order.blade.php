<x-user-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/user/order_detail.css') }}">
    </x-slot>
    {{--------------------- 
        $slot 
    --------------------}}
    <style>
        a[href = "{{ route('user.orders.index') }}"]{
            border-bottom: 3px solid var(--site_col_1);
        }
    </style>
        <h3>Thông tin đơn hàng</h3>
        <div class="grid">
            <div>
                <h4>ID đơn hàng #{{ $order->id }}</h4>
                <hr>
                <div>
                    <div class="flex_align">
                        <span>Trạng thái đơn hàng</span>
                        <span style="color: {{$status[$order->status][1]}}">{{ $status[$order->status][0] }}</span>
                    </div>
                    <div class="flex_align">
                        <span>Ngày đặt đơn</span>
                        <span>{{ $order->created_at }}</span>
                    </div>
                    @if ($order->status == 'N')
                        <form style="padding: 10px 0" action="{{ route('user.orders.update', ['order' => $order->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Huỷ đơn hàng">
                        </form>
                    @endif
                </div>
            </div>
            <div>
                <h4>Địa chỉ nhận hàng</h4>
                <hr>
                <div>
                    <Address>
                        <span>{{ $order->address_line }}</span><br>
                        <span>{{ $order->postal_code.", ".$order->city." ".$order->country }}</span>
                    </Address>
                </div>
            </div>
            <div>
                <h4>Thông tin hoá đơn</h4>
                <hr>
                <div>
                    @foreach ($order->transactions as $transaction)
                        <div class="flex_align">
                            <span>Phương thức thanh toán</span>
                            <span>{{ $mode[$transaction->mode] }}</span>
                        </div>
                        <div class="flex_align">
                            <span>Trạng thái thanh toán</span>
                            <span style="color: {{$status[$transaction->status][1]}}">{{ $status[$transaction->status][0] }}</span>
                        </div>
                        @if ($loop->remaining > 1)
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
            <div>
                <h4>Chi tiết đơn hàng</h4>
                <hr>
                <div>
                    <div class="flex_align">
                        <span>Tổng thu</span>
                        <span>{{ $order->grand_total }} VNĐ</span>
                    </div>
                    <div class="flex_align">
                        <span>Tên người nhận</span>
                        <span>{{ $order->first_name }}</span>
                    </div>
                </div>
            </div>

        </div>
        <div style="overflow-x: auto">
            <table style="width: 100%;min-width:450px" cellspacing="0">
                <thead>
                    <tr>
                        <td colspan="2">Sản phẩm</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Tổng tiền</td>
                    </tr>
                </thead>
                @foreach ($order->products as $product)
                    <tr>
                        <td>
                            <div class="img_container">
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}">
                            </div>
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }} VNĐ</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->pivot->quantity * $product->price }} VNĐ</td>
                    </tr>
                @endforeach
            </table>
        </div>
    {{--------------------- 
        $slot 
    --------------------}}
</x-user-layout>