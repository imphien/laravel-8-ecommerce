<x-app-layout>
    <x-slot name="style">
        {{-- <link rel="stylesheet" href="{{ asset('css/product.css') }}"> --}}
    </x-slot>
    <style>
        main {
            font-family: 'Roboto', sans-serif;
            padding: 2rem 1rem;
            max-width: 980px;
            margin: 0 auto;
        }

        main h1 {
            text-align: center;
            margin-bottom: 2rem;
        }

        main p {
            text-align: justify;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        main ol {
            padding-left: 1.2rem;
        }

        main ol li {
            margin-bottom: 0.8rem;
        }

        main strong {
            font-weight: bold;
        }

        .section-title {
            display: block;
            margin-top: 2rem;
            font-size: 1.5em;
            font-weight: bold;
        }
    </style>

    <section>
        @section('content')
            <main>
                <p><strong>HighPicks Sport</strong> là nhà phân phối sản phẩm <strong>Pickleball</strong> chính hãng uy tín danh tiếng tại thị trường Việt Nam. <strong>HighPicks Sport</strong> luôn tiên phong cung cấp các sản phẩm <strong>Pickleball</strong> từ các hãng sản xuất nổi tiếng hàng đầu thế giới.</p>
                <p>Với những hiểu biết về <strong>Pickleball</strong>, <strong>HighPicks Sport</strong> chúng tôi luôn mang đến các sản phẩm, dịch vụ chất lượng tốt nhất với phong cách phục vụ chuyên nghiệp, tận tâm đã được hàng ngàn khách hàng trên cả nước hợp tác và tín nhiệm, các đối tác mong muốn hợp tác.</p>
                <div style="text-align: center">
                    <img src="{{ asset('img/logo_intro.jpg') }}" alt="logo">
                </div>

                <span class="section-title">• TẦM NHÌN</span>
                <p>Với khát vọng tiên phong và chú trọng đầu tư mạnh mẽ yếu tố nhân sự cùng hệ thống công nghệ, máy móc phục vụ công việc. Chúng tôi phấn đấu đến tháng 12 năm 2025 sẽ trở thành đơn vị đứng đầu trong lĩnh vực cung cấp các sản phẩm <strong>Pickleball</strong> tại Việt Nam.</p>

                <span class="section-title">• SỨ MỆNH</span>
                <p>Đem đến cho khách hàng các sản phẩm <strong>Pickleball</strong>, phụ kiện cho môn thể thao <strong>Pickleball</strong> với chất lượng và dịch vụ tốt nhất, tối ưu nhất về chi phí.</p>
                <p>Tạo ra môi trường làm việc tốt nhất, một cuộc sống hạnh phúc nhất cho toàn thể cán bộ công nhân viên công ty nhằm tạo cơ hội phát triển năng lực bản thân, đóng góp giá trị cho doanh nghiệp, xã hội.</p>
                <p>Từ đó tạo dựng cuộc sống tốt đẹp, đầy đủ cho toàn thể cán bộ công nhân viên cùng gia đình.</p>

                <span class="section-title">• GIÁ TRỊ CỐT LÕI</span>
                <ol>
                    <li><strong>TÍN:</strong> <strong>HighPicks Sport</strong> đặt chữ TÍN lên vị trí hàng đầu, xem đó là vũ khí cạnh tranh và bảo vệ như danh dự bản thân.</li>
                    <li><strong>TÂM:</strong> Lấy khách hàng làm trung tâm, luôn phục vụ với sự tận tâm và chất lượng cao nhất.</li>
                    <li><strong>TỬ TẾ:</strong> Thấm nhuần sự tử tế trong suy nghĩ, lời nói và hành động hàng ngày.</li>
                    <li><strong>KHÁCH HÀNG:</strong> Luôn coi khách hàng là trung tâm trong mọi suy nghĩ và hành động.</li>
                    <li><strong>CẦU TIẾN:</strong> Không ngừng học hỏi, đổi mới và sẵn sàng thay đổi.</li>
                    <li><strong>GIỮ LỜI HỨA:</strong> Luôn giữ lời với khách hàng, đồng nghiệp, đối tác và nội bộ.</li>
                    <li><strong>TRÁCH NHIỆM:</strong> Luôn chủ động giải quyết vấn đề, không trốn tránh.</li>
                    <li><strong>YÊU THƯƠNG:</strong> Yêu thương như gia đình, phối hợp như một đội bóng.</li>
                    <li><strong>TRUNG THỰC:</strong> Thẳng thắn, trung thực và không gian dối trong công việc và cuộc sống.</li>
                </ol>
            </main>
    </section>
</x-app-layout>
