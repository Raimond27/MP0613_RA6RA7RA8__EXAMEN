<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('orders.pizzas.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.pizzas.show', ['order' => $order]);
    }

    public function create()
    {
        $pizzas = \App\Models\Pizza::all();
        $selectedPizza = request()->query('pizza_id') ? \App\Models\Pizza::findOrFail(request()->query('pizza_id')) : null;
        return view('orders.pizzas.create', ['pizzas' => $pizzas, 'selectedPizza' => $selectedPizza]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|integer|not_in:0',
            'toppings' => 'nullable|array',
            'toppings.*' => 'string|max:255',
        ]);

        $pizza = \App\Models\Pizza::findOrFail($validated['pizza_id']);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $pizza->name;
        $order->type = $pizza->type;
        $order->base = $pizza->base;
        $order->price = $pizza->price;
        $order->toppings = $validated['toppings'] ?? [];
        $order->image_url = $pizza->image_url;
        $order->save();

        return redirect(route('order.index'))->with('mssg', 'Thank you for your order');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect(route('order.index'))->with('mssg', 'Order has been canceled');
    }
}
