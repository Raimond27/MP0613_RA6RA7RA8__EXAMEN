<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_pizzas' => Pizza::count(),
            'total_orders' => Order::count(),
            'total_users' => User::where('role', 'client')->count(),
            'total_sales' => Pizza::sum('price'),
            'recent_orders' => Order::with('user')->latest()->take(10)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
