<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products      = Product::where('status', 1)->latest()->get();
        $productslider = Product::limit(5)->get();

        return view('index', compact('products', 'productslider'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->where('status', 1)->get();

        return view('home.category', [
            'category' => $category,
            'products' => $products,
        ]);
    }

    public function test($id, $number)
    {
        return view('home.test', compact('id', 'number'));
    }

    public function save(Request $request)
    {
        return $request->all();
    }
}
