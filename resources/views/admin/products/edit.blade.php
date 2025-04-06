<x-admin-layout>
    <x-slot name="style">
        {{-- <link rel="stylesheet" href="{{ asset('css/admin/') }}"> --}}
    </x-slot>

    {{-- -------------------
                   $slot
               ------------------ --}}
    <div class="_container">
       @if ($errors->any())
           @foreach ($errors->all() as $error)
               <p style="color: red">{{ $error }}</p>
           @endforeach
       @endif
        <h2>Cập nhật sản phẩm</h2>
        <form class="card" action="{{ route('admin.products.update', ['product' => $product->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <fieldset style="max-width: 200px">
                <legend>Category</legend>
                <select name="category_id" required>
                    @foreach ($categories as $category)
                        @if ($category->id == $product->category_id)
                            <option selected value="{{$category->id}}">{{ ucfirst($category->title) }}</option>
                            @continue
                        @endif
                        <option value="{{$category->id}}">{{ ucfirst($category->title) }}</option>
                    @endforeach
                </select>
            </fieldset><br>

            Tên sản phẩm: <input type="text" name="title" value="{{ $product->title }}" required placeholder="Tên sản phẩm"><br><br>

            Chọn hình ảnh: <br><br>
            <input id="up_img" type="file" name="image"><br><br>

            {{-- preview image --}}
            <img id="preview_img" style="max-width: 100px" src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->title }}"><br><br>

            Thông tin sản phẩm: <textarea cols="60" rows="20" style="resize: none" name="about" value="{{ $product->about }}" required placeholder="Product info"></textarea>
            <br><br>

            Giá sản phẩm: <input type="number" name="price" min="0" value="{{ $product->price }}" required><br><br>

            Số lượng sản phẩm: <input type="number" min="0" name="stock_quantity" value="{{ $product->stock_quantity }}" required><br><br>

            Giảm giá: <input type="number" min="0" name="discount" value="{{ $product->discount }}" step="5"><br><br>

            <input type="submit" value="Cập nhật sản phẩm">
        </form>
    </div>
    <script>
        // edit
        up_img.onchange = evt => {
            const [file] = up_img.files
            if (file) {
                preview_img.src = URL.createObjectURL(file)
            }
        }
    </script>
    {{-- -------------------
                   $slot
               ------------------ --}}
</x-admin-layout>
