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
    <div class="_container">
        @if (!$orders->isEmpty())
        <h1>Đơn hàng</h1><br>
        <div style="overflow-x: auto">
            <table style="width: 100%;min-width:650px" class="card">
                <thead>
                    <tr>
                        <th>Đơn hàng({{count($orders)}})</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            <div class="flex_align">
                                <div class="sm_card flex_align" style="flex-direction: column">
                                    <strong>{{ strtoupper($order->created_at->format('M')) }}</strong>
                                    <strong>{{ $order->created_at->format('d') }}</strong>
                                </div>
                                <div>
                                    <strong>ORD-{{ $order->id }}</strong><br>
                                    <span>Tổng tiền{{ $order->grand_total }} VNĐ</span>
                                </div>
                            </div>
                        </td>

                        <td><span style="background: {{$status[$order->status][1]}}" class="sm_card status">{{ $status[$order->status][0] }}</span></td>
                        <td><a href="{{ route('admin.orders.show', ['order' => $order->id]) }}">Xem đơn hàng</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        @else
            <p> Không có đơn hàng nào,   <a href="{{ route('admin.products.create') }}">Thêm sản phẩm nữa nhé</a></p>
        @endif

    </div>
    {{-- ------------------- 
            $slot 
        ------------------ --}}
</x-admin-layout>
