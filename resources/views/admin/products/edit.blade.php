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

               <fieldset style="max-width: 400px; margin-bottom: 20px;">
                   <legend>Danh mục</legend>
                   <div style="display: flex; align-items: center; margin-bottom: 12px;">
                       <label for="category_id" style="width: 150px; font-weight: bold;">Chọn danh mục:</label>
                       <select name="category_id" id="category_id" required style="flex: 1; padding: 6px; max-width: 200px;">
                           @foreach ($categories as $category)
                               <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                   {{ ucfirst($category->title) }}
                               </option>
                           @endforeach
                       </select>
                   </div>
               </fieldset>

               <div style="display: flex; align-items: center; margin-bottom: 12px;">
                   <label for="title" style="width: 150px; font-weight: bold;">Tên sản phẩm:</label>
                   <input type="text" name="title" id="title" value="{{ $product->title }}" required placeholder="Tên sản phẩm"
                          style="flex: 1; padding: 6px; max-width: 200px;">
               </div>

               <div style="display: flex; align-items: center; margin-bottom: 12px;">
                   <label for="image" style="width: 150px; font-weight: bold;">Chọn hình ảnh:</label>
                   <input id="up_img" type="file" name="image" style="flex: 1; max-width: 200px;">
               </div>

               <div style="display: flex; align-items: center; margin-bottom: 12px;">
                   <label style="width: 150px; font-weight: bold;">Xem trước:</label>
                   <img id="preview_img" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                        style="max-width: 100px;">
               </div>

               <div style="display: flex; align-items: flex-start; margin-bottom: 12px;">
                   <label for="about" style="width: 150px; font-weight: bold; padding-top: 6px;">Thông tin:</label>
                   <textarea name="about" id="about" required placeholder="Thông tin"
                             style="flex: 1; padding: 6px; max-width: 400px;" rows="10">{{ $product->about }}</textarea>
               </div>

               <div style="display: flex; align-items: center; margin-bottom: 12px;">
                   <label for="price" style="width: 150px; font-weight: bold;">Giá:</label>
                   <input type="number" name="price" id="price" min="0" value="{{ $product->price }}" required
                          style="flex: 1; padding: 6px; max-width: 200px;">
               </div>

               <div style="display: flex; align-items: center; margin-bottom: 12px;">
                   <label for="stock_quantity" style="width: 150px; font-weight: bold;">Số lượng:</label>
                   <input type="number" name="stock_quantity" id="stock_quantity" min="0" value="{{ $product->stock_quantity }}"
                          required style="flex: 1; padding: 6px; max-width: 200px;">
               </div>

               <div style="display: flex; align-items: center; margin-bottom: 20px;">
                   <label for="discount" style="width: 150px; font-weight: bold;">Giảm giá (%):</label>
                   <input type="number" name="discount" id="discount" min="0" step="5" value="{{ $product->discount }}"
                          style="flex: 1; padding: 6px; max-width: 200px;">
               </div>

               <input type="submit" value="Cập nhật sản phẩm" style="margin-left: 150px; padding: 8px 16px;">
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
