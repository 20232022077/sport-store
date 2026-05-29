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
        $data = Product::all();

        return view('admin.product.index', ['data' => $data]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'status' => 'required',
        ]);

        $data = new Product();
        $data->category_id  = $request->input('category_id', 0);
        $data->user_id      = 1;
        $data->title        = $request->input('title');
        $data->keywords     = $request->input('keywords');
        $data->description  = $request->input('description');
        $data->price        = $request->input('price', 0);
        $data->quantity     = $request->input('quantity', 0);
        $data->minquantity  = $request->input('minquantity', 0);
        $data->tax          = $request->input('tax', 0);
        $data->status       = $request->input('status');
        $data->detail       = $request->input('detail');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data->image = $path;
        }

        $data->save();

        return redirect()->route('admin.product.index')->with('success', 'Product added successfully.');
    }

    public function show($id)
    {
        $data = Product::find($id);

        return view('admin.product.show', ['data' => $data]);
    }

    public function edit($id)
    {
        $data       = Product::find($id);
        $categories = Category::all();

        return view('admin.product.edit', [
            'data'       => $data,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Product::find($id);

        $data->category_id  = $request->input('category_id', 0);
        $data->title        = $request->title;
        $data->keywords     = $request->keywords;
        $data->description  = $request->description;
        $data->price        = $request->price;
        $data->quantity     = $request->quantity;
        $data->minquantity  = $request->minquantity;
        $data->tax          = $request->tax;
        $data->status       = $request->status;
        $data->detail       = $request->detail;

        if ($request->hasFile('image')) {
            if ($data->image) {
                Storage::disk('public')->delete($data->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $data->image = $path;
        }

        $data->save();

        return redirect()->route('admin.product.index');
    }

    public function destroy($id)
    {
        $data = Product::find($id);

        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }

        $data->delete();

        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }
}
