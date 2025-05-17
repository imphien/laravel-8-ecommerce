<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.categories', [
            'categories' => $categories
        ]);
    }


    public function create()
    {
        return view('admin.categories.create');

    }


    public function store(Request $request)
    {
        //  xác thực
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image'//k quá 50kb
        ]);

        // lưu trữ trong cơ sở dữ liệu, lấy tham số yêu cầu từ $ được xác thực chứ không phải từ $request.
        $path = Storage::putFile('public/categories', $validated['image']);
        $category = new Category();
        $category->title = $validated['title'];
        $category->image = str_replace('public', '', $path);
        $category->save();

        return redirect()->route('admin.categories.index')->with('status', $validated['title'].' category created');

    }

    // show category


    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image'
        ]);

        $request->whenHas('image', function ($input) use ($category){
            Storage::delete($category->image);
            $path = Storage::putFile('public/categories', $input);
            $category->image = str_replace('public', '', $path);
        });

        $category->title = $validated['title'];
        $category->save();

        return redirect()->route('admin.categories.index')->with('status', $validated['title'].' Danh mục đã được cập nhật');

    }

    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $title = $category->title;
        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', $title.' đã xoá');
    }
}
