<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $productslider = Product::limit(5)->get();
        $productlist1  = Product::limit(6)->get();
        $page          = 'home';

        return view('index', compact('productslider', 'productlist1', 'page'));
    }

    public function product($id)
    {
        $data   = Product::find($id);
        $images = DB::table('images')->where('product_id', $id)->get();

        return view('home.product', [
            'data'   => $data,
            'images' => $images,
        ]);
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
