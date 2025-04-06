<x-auth-layout>
    {{--------------------- 
        $slot 
    --------------------}}
    @if(session('status'))
        <p style="color:red">{{session("status")}}</p>
    @endif
        <form action="{{ route('login') }}" method="post" autocomplete="off">
            @csrf
            <label for="email">Email</label><br>
            <input class="fill_data" type="email" name="email" id="email" required><br><br>

            <label for="password">Password</label><br>
            <input class="fill_data" type="password" name="password" id="password" required><br><br>

            <input type="checkbox" id="rem" name="remember">
            <label for="rem">Nhớ tài khoản</label><br><br>

            <div>
                <div class="submit">
                    <a href="{{ route('register') }}">Tạo tài khoản </a>
                    <input type="submit" value="Đăng nhập">
                </div>
            </div>
        </form>
    {{--------------------- 
        $slot 
    --------------------}}
</x-auth-layout>