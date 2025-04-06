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
            .amtra-image {
                width: 750px;
                height: 520px;
                display: block; 
                margin: 0 auto;
                
            }
            h1 {
            text-align: center;
            }
            .congdung{
                font-family: 'Roboto', sans-serif;
                display: grid;
                place-items: center;
                text-align: left;
                margin: 100px;
            }
            .chen-image {
                width: 750px;
                height: 420px;
                display: block; 
                margin: 0 auto;
            }
                
        </style>
        <section>
        @section('content')
    <div class="container">
        <h1>Sắc và uống thuốc Đông y thế nào cho đúng?</h1>
        <div class="congdung">
            <div>
                <p>Người xưa cho rằng: Thuốc có công hiệu hay không một phần quan trọng là do cách sắc thuốc và uống thuốc.</p>
               <h3> Cách sắc thuốc </h3>
               <img src="img/ampha.jpeg" alt="Store Image" class="amtra-image">
               <p >
                Để nâng cao hiệu quả và tác dụng của thuốc cần sắc thuốc đúng cách trên cơ sở khoa học như sau:<br>
                Ấm sắc thuốc: Nên dùng ấm bằng đất nung hoặc bằng sứ, không nên dùng ấm bằng kim loại kể cả nhôm để sắc thuốc bởi vì<br>
                 trong các vị thuốc có rất nhiều các hoạt chất hữu cơ dễ bị kim loại phân hủy đặc biệt là tanin, sẽ làm biến đổi các hoạt chất của thuốc,
                đôi khi còn có thể gây độc ảnh hưởng đến sức khỏe người dùng thuốc.
                Nước sắc thuốc: Dùng nước sạch để sắc thuốc (nước mưa, nước giếng, nước máy). Lượng nước sử dụng để sắc thuốc tùy theo lượng thuốc nhiều hay ít mà đổ nước cho vừa phải. <br>
                Theo kinh nghiệm nên đổ nước ngập thuốc chừng 2 đốt ngón tay là vừa đối với lần đầu; những lần sắc sau thì nên đổ ít hơn lần trước một chút.<br>
                Cách sắc thuốc: Trước khi sắc thuốc, nên ngâm thuốc vào nước ấm hoặc nước lã sạch 15-30 phút, để tạo điều kiện cho các hoạt chất tách ra được dễ dàng và rút ngắn được thời gian sắc thuốc.<br>
                Nếu là thuốc bổ nên sắc 3 lần, dùng lửa nhỏ sắc lâu. Mỗi lần sắc từ 60-90 phút.<br>
                </p>
                <h3>Cách uống thuốc</h3>
                <p>
                Uống thuốc vào thời điểm nào, mỗi lần uống bao nhiêu, uống làm bao nhiêu lần... cũng có ảnh hưởng nhất định đến hiệu quả của thuốc. Vì vậy khi uống thuốc Đông y cần lưu ý một số điểm như sau:

                Thời gian uống thuốc:<br>
                <br>

                - Chữa bệnh ở thượng tiêu (các bệnh tim, phổi, nên uống thuốc sau khi ăn).<br>

                - Chữa bệnh ở trung hạ tiêu (bệnh ở gan, mật, dạ dày, bàng quang...) uống thuốc trước khi ăn.<br>

                - Chữa bệnh ở kinh mạch, tứ chi uống thuốc vào lúc sáng sớm chưa ăn gì.<br>

                - Chữa bệnh ở xương tủy uống thuốc lúc ăn no vào buổi tối.<br>

                - Uống thuốc an thần nên uống trước khi đi ngủ.<br>

                - Uống thuốc để chữa các bệnh cấp tính nên uống thuốc khi cần.<br>

                - Nếu là thuốc bổ nên uống trước khi ăn.<br>

                - Nếu là thuốc chữa bệnh nên uống vào lúc đói.<br>

                - Mỗi thang thuốc nên chia uống làm 3-4 lần trong 1 ngày, nếu thuốc chữa bệnh cấp tính thì uống hết trong một lần.<br>

                - Thuốc thang thì nên trộn đều các lần sắc với nhau và chia đều uống trong 1 ngày, uống khi thuốc còn ấm. Nếu là thuốc giải cảm khi uống xong cần phải tránh gió và đắp chăn cho ra mồ hôi vừa để đuổi tà khí.<br>

                - Nếu là thuốc hàn (lạnh) để chữa bệnh nhiệt nên uống lúc còn nóng.<br>

                - Nếu đã dùng thuốc đúng bệnh, uống thuốc rồi nhưng vẫn bị nôn thì nên giảm lượng thuốc uống hoặc thêm 3 lát gừng sống cho vào thuốc sắc hoặc là nhấm 1 lát gừng tươi trước khi uống thuốc.<br>

                - Uống thuốc thấy bị đi lỏng, phân nát thì phải cho thêm ít gừng nướng, đập dập sắc chung với nước.<br>

                - Uống thuốc thấy đi ngoài phân táo cần cho thêm vài ba đốt mía vào sắc chung hoặc cho thêm 1 thìa mật ong vào nước thuốc để uống.<br>

                - Đối với người già khi uống thuốc nên dùng lượng nhỏ, chia nhiều lần để thăm dò.<br>
                </p>
                <img src="img/chen2.jpeg" alt="Store Image" class="chen-image">
            </div>
    </div>
        </section>

    {{--------------------- 
        $slot 
    --------------------}}
</x-app-layout>