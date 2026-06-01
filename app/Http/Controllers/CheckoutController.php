<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $items = ShopCart::where('user_id', Auth::id())->with('product')->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $total = $items->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0);

        return view('home.checkout', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_name'    => 'required|string|max:255',
            'shipping_address' => 'required|string|max:500',
            'phone'            => 'required|string|max:30',
            'email'            => 'required|email|max:255',
        ]);

        $items = ShopCart::where('user_id', Auth::id())->with('product')->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $total = $items->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0);

        DB::beginTransaction();

        try {
            $order                   = new Order();
            $order->user_id          = Auth::id();
            $order->total_price      = $total;
            $order->shipping_name    = $request->shipping_name;
            $order->shipping_address = $request->shipping_address;
            $order->phone            = $request->phone;
            $order->email            = $request->email;
            $order->status           = 'New';
            $order->save();

            foreach ($items as $item) {
                $orderItem             = new OrderItem();
                $orderItem->order_id   = $order->id;
                $orderItem->product_id = $item->product_id;
                $orderItem->price      = $item->product->price;
                $orderItem->quantity   = $item->quantity;
                $orderItem->save();
            }

            ShopCart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('userpanel.orders')->with('success', 'Order placed successfully! Order #' . $order->id);

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
