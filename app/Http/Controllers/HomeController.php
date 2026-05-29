<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data     = Product::find($id);
        $images   = DB::table('images')->where('product_id', $id)->get();
        $comments = Comment::where('product_id', $id)->where('status', 'approved')->with('user')->latest()->get();

        return view('home.product', [
            'data'     => $data,
            'images'   => $images,
            'comments' => $comments,
        ]);
    }

    public function storecomment(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'subject'    => 'required|string|max:255',
            'review'     => 'required|string',
            'rate'       => 'required|integer|min:1|max:5',
        ]);

        $comment             = new Comment();
        $comment->user_id    = Auth::id();
        $comment->product_id = $request->product_id;
        $comment->subject    = $request->subject;
        $comment->review     = $request->review;
        $comment->rate       = $request->rate;
        $comment->ip_address = request()->ip();
        $comment->status     = 'new';
        $comment->save();

        return redirect()->back()->with('success', 'Your review has been submitted and is pending approval.');
    }

    public function categoryproducts($id, $slug)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();

        return view('home.category_products', [
            'category' => $category,
            'products' => $products,
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

    public function storemessage(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $msg             = new Message();
        $msg->name       = $request->name;
        $msg->email      = $request->email;
        $msg->phone      = $request->phone;
        $msg->subject    = $request->subject;
        $msg->message    = $request->message;
        $msg->ip_address = request()->ip();
        $msg->status     = 0;
        $msg->save();

        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function about()
    {
        $setting = Setting::first();
        return view('home.about', compact('setting'));
    }

    public function references()
    {
        $setting = Setting::first();
        return view('home.references', compact('setting'));
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact', compact('setting'));
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
