<x-user-layout>
    {{--------------------- 
        $slot 
    --------------------}}

        @if (! $orders->isEmpty())
        <h2>Đơn hàng của tôi</h2>
        <div style="overflow-x: auto">
            <table style="width: 100%;min-width:450px" cellspacing="0">
                <thead>
                    <tr>
                        <td>ID Đơn hàng</td>
                        <td>Ngày đặt đơn</td>
                        <td>Thanh toán</td>
                        <td>Trạng thái</td>
                        <td>Chi tiết</td>
                    </tr>
                </thead>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->grand_total }} VNĐ</td>
                        <td style="color: {{$status[$order->status][1]}}">{{ $status[$order->status][0] }}</td>
                        <td class="message"><a href="{{ route('user.orders.show', ['order' => $order->id]) }}">Xem đơn hàng</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        @else
            <h3 class="message">Chưa có đơn hàng nào được đặt <a href="{{ route('shop') }}">Mua hàng ngay</a></h3 >
        @endif
    {{--------------------- 
        $slot 
    --------------------}}
</x-user-layout>