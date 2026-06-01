<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');

        $query = Order::with('user')->latest();

        if ($status) {
            $query->where('status', $status);
        }

        $data = $query->get();

        return view('admin.order.index', [
            'data'   => $data,
            'status' => $status,
        ]);
    }

    public function show($id)
    {
        $order = Order::with(['user', 'items.product'])->find($id);

        return view('admin.order.show', ['order' => $order]);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.order.show', $id)->with('success', 'Order status updated.');
    }

    public function updateNote(Request $request, $id)
    {
        $order = Order::find($id);
        $order->admin_note = $request->admin_note;
        $order->save();

        return redirect()->route('admin.order.show', $id)->with('success', 'Note saved.');
    }
}
