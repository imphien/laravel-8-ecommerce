<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.products', [
            'products' => Product::all()
        ]);
    }


    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all('id', 'title')
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image',
            'about' => 'required|max:2000',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|numeric|min:0',
            'discount' => 'multiple_of:5|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $path = Storage::putFile('public/products', $validated['image']);

        $product = new Product();
        $category = Category::find($validated['category_id']);

        $product->title = $validated['title'];
        $product->image = str_replace('public', '', $path);
        $product->about = $validated['about'];
        $product->price = $validated['price'];
        $product->stock_quantity = $validated['stock_quantity'];

        $request->whenHas('discount', function ($input) use ($product){
            $product->discount = $input;
        });

        $category->products()->save($product);

        return redirect()->route('admin.products.index')->with('status', 'Thêm sản phẩm thành công');
    }


    // public function show(Product $product)



    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all('id', 'title')
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'max:255',
            'image' => 'image',
            'about' => 'max:1000',
            'price' => 'numeric|min:0',
            'stock_quantity' => 'numeric|min:0',
            'discount' => 'multiple_of:5|min:0',
            'category_id' => 'exists:categories,id'
        ]);

        $product->title = $validated['title'];

        if($request->has(['image'])){
            Storage::delete($product->image);
            $path = Storage::putFile('public/products', $validated['image']);
            $product->image = str_replace('public', '', $path);
        }

        $product->discount = $validated['discount'];
        $product->about = $validated['about'];
        $product->price = $validated['price'];
        $product->stock_quantity = $validated['stock_quantity'];

        $category = Category::find($validated['category_id']);

        $category->products()->save($product);


        return redirect()->route('admin.products.index')->with('status', 'Cập nhật sản phẩm thành công');
    }


    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $title = $product->title;
        $product->delete();

        return redirect()->route('admin.products.index')->with('status', 'Sản phẩm "'.$title.'" xoá thành công');
    }
}
