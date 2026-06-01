<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserPanelController extends Controller
{
    public function index()
    {
        return view('userpanel.index');
    }

    public function profile()
    {
        return view('userpanel.profile');
    }

    public function reviews()
    {
        $reviews = Comment::where('user_id', Auth::id())->with('product')->latest()->get();

        return view('userpanel.reviews', ['reviews' => $reviews]);
    }

    public function deletereview($id)
    {
        $review = Comment::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$review) {
            return redirect()->route('userpanel.reviews')->with('error', 'Review not found or access denied.');
        }

        $review->delete();

        return redirect()->route('userpanel.reviews')->with('success', 'Review deleted successfully.');
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('userpanel.orders', ['orders' => $orders]);
    }

    public function orderdetail($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->with('items.product')->first();

        if (!$order) {
            return redirect()->route('userpanel.orders');
        }

        return view('userpanel.orderdetail', ['order' => $order]);
    }

    public function products()
    {
        return view('userpanel.products');
    }
}
