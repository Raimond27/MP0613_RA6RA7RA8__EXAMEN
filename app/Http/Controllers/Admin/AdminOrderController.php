<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        $totalPrice = Order::sum('price');
        return view('admin.orders.index', compact('orders', 'totalPrice'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }
}
