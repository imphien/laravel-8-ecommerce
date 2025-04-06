<x-admin-layout>
    <x-slot name="style">
        {{-- <link rel="stylesheet" href="{{ asset('css/admin/') }}"> --}}
    </x-slot>

    {{--------------------- 
            $slot 
        --------------------}}
        <div class="_container">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            <h2>Tạo danh mục mới</h2>
            <form class="card" action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                Tên danh mục: <input type="text" name="title" value="{{ old('title') }}" required placeholder="Tên danh mục"><br><br>
                Chọn ảnh: <br><br>
                <input type="file" name="image" required><br><br>
                <input type="submit" value="Thêm danh mục">
            </form>
        </div>
    {{--------------------- 
            $slot 
        --------------------}}
</x-admin-layout>