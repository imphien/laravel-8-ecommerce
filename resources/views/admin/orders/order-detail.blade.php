<x-admin-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/order.css') }}">
    </x-slot>
    <x-slot name="js">
        {{-- <script src="{{ asset('js/admin/category.js') }}" defer></script> --}}
    </x-slot>

    {{-- ------------------- 
            $slot 
        ------------------ --}}
    <style>
        a[href = "{{ route('admin.orders.index') }}"]{
            color: var(--text-blue);
        }
    </style>
    <div class="_container">
        <a class="back_link" href="{{ route('admin.orders.index') }}">
            <span class="material-icons">arrow_back</span>
            Orders
        </a>
        <h1>ORD-{{ $order->id }}</h1>
        <p class="flex_align">
            <span class="text_grey">Thời gian đặt hàng</span>
            <span class="text_grey text_icon material-icons">calendar_today</span>
            <span>{{ $order->created_at->format('d/m/y h:i') }}</span>
        </p>
        <div class="card" style="margin-bottom: 2rem">
            <h3>Thông tin cơ bản</h3>
            <hr>
            <div class="order_details">
                <span>Tên khách hàng</span>
                <span style="color: #688eff">{{ $order->first_name." ".$order->last_name }}</span>
            </div>
            <div class="order_details">
                <span>Địa chỉ</span>
                <span>
                    <Address>
                        <span>{{ $order->address_line }}</span><br>
                        <span>{{ $order->postal_code.", ".$order->city." ".$order->country }}</span>
                    </Address> 
                </span>
            </div>
            <div class="order_details">
                <span>Số điện thoại</span>
                <span>{{ $order->mobile }}</span>
            </div>
            <div class="order_details">
                <span>Date</span>
                <span>{{ $order->created_at->format('d/m/y h:i') }}</span>
            </div>
            <div class="order_details">
                <span>Tổng tiền thanh toán</span>
                <span>{{ $order->grand_total }}</span>
            </div>
            <div class="order_details">
                <span>Trạng thái đơn hàng</span>
                <form action="{{ route('admin.orders.update', ['order' => $order->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="status">
                        <option value="{{ $order->status }}">{{ $status[$order->status][0] }}</option>
                        @if (! in_array($order->status, ['C', 'D']))
                            <option value="D">Đã vẫn chuyển</option>
                        @endif
                    </select><br>
                    <input type="submit" value="Lưu">
                    <input type="reset" value="Huỷ">
                </form>
            </div>
        </div>

        <div class="card" style="margin-bottom: 2rem">
            <h3>Thanh toán</h3>
            <hr>
            @foreach ($order->transactions as $transaction)
                <div class="order_details">
                    <span>ID giao dịch</span>
                    <span>{{ $transaction->id }}</span>
                </div>
                <div class="order_details">
                    <span>Phương thức thanh toán</span>
                    <span>{{ $mode[$transaction->mode] }}</span>
                </div>
                <div class="order_details">
                    <span>Trạng thái thanh toán</span>
                    <form action="{{ route('admin.transactions.update', ['transaction' => $transaction->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <select name="status">
                            <option value="{{ $transaction->status }}">{{ $status[$transaction->status][0] }}</option>
                            <option value="P">Đã thanh toán</option>
                        </select><br>
                        <input type="submit" value="Lưu">
                        <input type="reset" value="Huỷ">
                    </form>
                </div>
                @if ($loop->remaining > 1)
                    <hr>
                @endif
            @endforeach
        </div>

        <div class="card">
            <h3>Các mặt hàng </h3>
            <hr>
            
            <div style="overflow-x: auto">
                <table style="width: 100%;min-width:450px" cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="2">Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tiền thanh toán</th>
                        </tr>
                    </thead>
                    @foreach ($order->products as $product)
                        <tr>
                            <td style="width: 100px">
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
           
        </div>
    </div>
    {{-- ------------------- 
            $slot 
        ------------------ --}}
</x-admin-layout>
