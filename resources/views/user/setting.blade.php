<x-user-layout>
    {{--------------------- 
        $slot 
    --------------------}}
    <h1>
        Cài đặt Trang</h1>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input class="logout" type="submit" value="Logout">
    </form>
    {{--------------------- 
        $slot 
    --------------------}}
</x-user-layout>