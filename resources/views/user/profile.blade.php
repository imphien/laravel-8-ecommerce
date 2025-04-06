<x-user-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    </x-slot>

    <x-slot name="js">
        <script src="{{ asset('js/checkout.js') }}" defer></script>
    </x-slot>
    {{--------------------- 
        $slot 
    --------------------}}
    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post">
        @csrf
        <h2>Thông tin cá nhân</h2>
        <div class="form_group">
            <label for="first_name">Họ</label>
            <input id="first_name" type="text" name="first_name" value="{{ $user->first_name }}" required>
        </div>
        <div class="form_group">
            <label for="last_name">Tên</label>
            <input id="last_name" type="text" name="last_name" value="{{ $user->last_name }}" required>
        </div>
        <div class="form_group">
            <label for="email">Địa chỉ Email</label>
            <input id="email" type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <button type="submit">Chỉnh sửa thông tin cá nhân</button>
    </form>
    {{--------------------- 
        $slot 
    --------------------}}
</x-user-layout>