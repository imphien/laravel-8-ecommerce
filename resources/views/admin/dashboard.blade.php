<x-admin-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    </x-slot>
    <x-slot name="js">
        <script src="{{ asset('js/admin/dashboard.js') }}" defer></script>
    </x-slot>
    <x-slot name="chart">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </x-slot>

    {{---------------------
            $slot
        --------------------}}
        <div class="_container">
            <div class="headings flex_align">
                <div class="good">
                    <p>Tổng quan</p>
                    <h3>Xin chào, {{ ucfirst(auth()->user()->first_name) }}</h3>
                    <p>Xin kính chào quý khách, chúc bạn làm việc 1 ngày vui vẻ</p>
                </div>
                <button class="cta card flex_align">
                    <span class="material-icons">add</span>
                    <a style="text-decoration: none" href="{{ route('admin.products.create') }}"><p>Thêm sản phẩm</p></a>
                </button>
            </div>

        </div>
    {{---------------------
            $slot
        --------------------}}
</x-admin-layout>
