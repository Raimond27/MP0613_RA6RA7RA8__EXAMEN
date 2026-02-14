@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3"><i class="fas fa-chart-line"></i> Admin Dashboard</h1>
                <p class="text-muted">Welcome back, {{ Auth::user()->name }}!</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-pizza-slice fa-3x text-danger"></i>
                        </div>
                        <h3 class="mb-0">{{ $stats['total_pizzas'] }}</h3>
                        <p class="text-muted mb-0">Total Pizzas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-shopping-cart fa-3x text-success"></i>
                        </div>
                        <h3 class="mb-0">{{ $stats['total_orders'] }}</h3>
                        <p class="text-muted mb-0">Total Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h3 class="mb-0">{{ $stats['total_users'] }}</h3>
                        <p class="text-muted mb-0">Total Clients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-dollar-sign fa-3x text-warning"></i>
                        </div>
                        <h3 class="mb-0">${{ number_format($stats['total_sales'], 2) }}</h3>
                        <p class="text-muted mb-0">Total Sales</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="fas fa-bolt"></i> Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('admin.pizzas.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add New Pizza
                            </a>
                            <a href="{{ route('admin.pizzas.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-list"></i> Manage Pizzas
                            </a>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-success">
                                <i class="fas fa-shopping-cart"></i> View Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="fas fa-clock"></i> Recent Orders</h5>
                    </div>
                    <div class="card-body">
                        @if($stats['recent_orders']->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Pizza Type</th>
                                        <th>Base</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($stats['recent_orders'] as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>
                                                @if($order->user)
                                                    {{ $order->user->name }}
                                                @else
                                                    <span class="text-muted">Guest</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->type }}</td>
                                            <td>{{ $order->base }}</td>
                                            <td>${{ $order->price }}</td>
                                            <td>{{ $order->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle"></i> No recent orders found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
