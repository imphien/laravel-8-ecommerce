<x-admin-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/account.css') }}">
    </x-slot>
    <x-slot name="js">
        {{-- <script src="{{ asset('js/admin/category.js') }}" defer></script> --}}
    </x-slot>

    {{-- ------------------- 
            $slot 
        ------------------ --}}
    <div class="_container">
        <h1>TÀI KHOẢN</h1><br>
        <p>Tổng quan</p>
        <hr>
        <div class="general">
            <div class="profile card">
                <div>
                    <img class="d-b" src="{{ asset('storage/avatar/admin.jpg') }}" alt="admin">
                    <p>{{ $user->full_name }}</p>
                </div>
            </div>
            <form class="details card" action="{{ route('admin.account.update') }}" method="POST">
                    @if (session('status'))
                        <p style="grid-column: span 2; color: rgb(20, 236, 20)">{{ session('status') }}</p>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p style="grid-column: span 2; color: red">{{ $error }}</p>
                        @endforeach
                    @endif

                    @csrf
                    <input type="text" name="first_name" placeholder="Họ" value="{{ $user->first_name }}" required>
                    <input type="text" name="last_name" placeholder="Tên" value="{{ $user->last_name }}" required>
                    <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" disabled>
                    <input type="number" name="mobile" value="{{ $user->mobile }}" placeholder="Số điện thoại">
                    <textarea name="intro" cols="30" rows="10" placeholder="Giới thiệu bản thân bạn nha">{{$user->intro}}</textarea>

                    <input type="submit" value="Lưu thay đổi">
            </form>
        </div>


        <p style="margin-top: 3rem">Bảo mật</p>
        <hr>
        <div class="security">
            <div class="card change_pwd">
                <h3>Thay đổi mật khẩu</h3>
                <form action="{{ route('admin.account.pwd') }}" method="post">
                    @if (session('pwdStatus'))
                        <p style="grid-column: span 2; color: rgb(20, 236, 20)">{{ session('pwdStatus') }}</p>
                    @endif

                    @if ($errors->pwdError->any())
                        @foreach ($errors->pwdError->all() as $error)
                        <p style="color: red">{{ $error }}</p>
                        @endforeach
                    @endif

                    @csrf
                    <input type="password" name="old" placeholder="Mật khẩu cũ" required><br>
                    <input type="password" name="password" placeholder="Mật khẩu mới" required><br>
                    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu mới" required><br>
                    <input type="submit" value="Thay đổi mật khẩu">
                </form>
            </div>
        </div>

    </div>

    {{-- ------------------- 
            $slot 
        ------------------ --}}
</x-admin-layout>
