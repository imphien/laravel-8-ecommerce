<x-user-layout>
    {{--------------------- 
        $slot 
    --------------------}}
    <h3>Địa chỉ</h3>
        @if ($address = auth()->user()->addresses()->first())
            <div class="details_card">
                <strong>Địa chỉ chính xác : </strong><span>175 Tây Sơn Đống Đa Hà Nội</span><br>
                <strong>Thành phố : </strong><span>Hà Nội</span><br>
                <strong>Mã code : </strong><span>00120</span><br>
                <strong>Nước : </strong><span>Việt Nam</span><br>
            </div><br><br>
        @else
            <form action="{{ route('fake_addr') }}" method="post">
                @csrf
                <input type="submit" value="generate fake address">
            </form>
        @endif
    <hr>    
    <h3>Chi tiết thanh toán của bạn </h3>
        @if ($payment = auth()->user()->payments()->first())
        <div class="details_card">
            <strong>Loại Thẻ : </strong><span>{{$payment->card_type}}</span><br>
            <strong>Số thẻ : </strong><span>************{{ substr($payment->card_number, -4) }}</span><br>
        </div>
        @else
            <form action="{{ route('fake_pay') }}" method="post">
                @csrf
                <input type="submit" value="generate fake payment details">
            </form>
        @endif
    {{--------------------- 
        $slot 
    --------------------}}
</x-user-layout>