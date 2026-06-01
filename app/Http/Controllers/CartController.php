<?php

namespace App\Http\Controllers;

use App\Models\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($id)
    {
        $existing = ShopCart::where('user_id', Auth::id())
                            ->where('product_id', $id)
                            ->first();

        if ($existing) {
            $existing->quantity += 1;
            $existing->save();
        } else {
            $cart             = new ShopCart();
            $cart->user_id    = Auth::id();
            $cart->product_id = $id;
            $cart->quantity   = 1;
            $cart->save();
        }

        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $existing = ShopCart::where('user_id', Auth::id())
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($existing) {
            $existing->quantity += $request->quantity ?? 1;
            $existing->save();
        } else {
            $cart             = new ShopCart();
            $cart->user_id    = Auth::id();
            $cart->product_id = $request->product_id;
            $cart->quantity   = $request->quantity ?? 1;
            $cart->save();
        }

        return redirect()->route('cart')->with('success', 'Product added to cart.');
    }

    public function cartList()
    {
        $items = ShopCart::where('user_id', Auth::id())->with('product')->get();
        $total = $items->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0);

        return view('home.cart', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    public function updateCart(Request $request, $id)
    {
        $item = ShopCart::where('id', $id)->where('user_id', Auth::id())->first();

        if ($item) {
            $item->quantity = $request->quantity;
            $item->save();
        }

        return redirect()->route('cart');
    }

    public function deleteCartItem($id)
    {
        ShopCart::where('id', $id)->where('user_id', Auth::id())->delete();

        return redirect()->route('cart')->with('success', 'Item removed from cart.');
    }

    public function clearCart()
    {
        ShopCart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart')->with('success', 'Cart cleared.');
    }
}
