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
            <h2>Tạo sản phẩm</h2>
            <form class="card" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset style="max-width: 200px">
                    <legend>Danh mục</legend>
                    <select name="category_id" required>
                        @foreach ($categories as $category)
                            @if (old('category_id') == $category->id)
                                <option selected value="{{$category->id}}">{{ ucfirst($category->title) }}</option>
                                @continue
                            @endif
                            <option value="{{$category->id}}">{{ ucfirst($category->title) }}</option>
                        @endforeach
                    </select>
                </fieldset><br>

                Tên sản phẩm: <input type="text" name="title" value="{{ old('title') }}" required placeholder="Tên sản phẩm"><br><br>

                Chọn hình ảnh: <br><br>
                <input type="file" name="image" required><br><br>

                Thông tin sản phẩm: <input type="text" name="about" value="{{ old('about') }}" required placeholder="Thông tin"><br><br>

                Giá: <input type="number" name="price" min="0" value="{{ old('price') }}" required><br><br>

                Số lượng sản phẩm: <input type="number" min="0" name="stock_quantity" value="{{ old('stock_quantity') }}" required><br><br>

                Giảm giá: <input type="number" min="0" value="{{ old('discount') }}" name="discount" step="5"><br><br>

                <input type="submit" value="Tạo sản phẩm mới">
            </form>
        </div>
    {{--------------------- 
            $slot 
        --------------------}}
</x-admin-layout>