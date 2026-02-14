@extends('admin.layouts.admin')

@section('title', 'Manage Orders')

@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0"><i class="fas fa-shopping-cart"></i> Manage Orders</h1>
            <a class="btn btn-outline-secondary" href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-muted mb-0">Total Revenue</h5>
                        <h2 class="text-success mb-0">${{ number_format($totalPrice, 2) }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                @if($orders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Email</th>
                                <th scope="col">Pizza</th>
                                <th scope="col">Type</th>
                                <th scope="col">Base</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>
                                        @if($order->user)
                                            <strong>{{ $order->user->name }}</strong>
                                        @else
                                            <span class="text-muted">Guest</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->user)
                                            {{ $order->user->email }}
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->type }}</td>
                                    <td>{{ $order->base }}</td>
                                    <td><span class="badge bg-success">${{ $order->price }}</span></td>
                                    <td>
                                        <small>{{ $order->created_at->format('d/m/Y') }}</small><br>
                                        <small class="text-muted">{{ $order->created_at->format('H:i') }}</small>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-sm btn-outline-info" href="{{ route('admin.orders.show', $order->id) }}" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger" type="submit" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $orders->links() }}
                    </div>
                @else
                    <div class="alert alert-info mb-0">
                        <i class="fas fa-info-circle"></i> No orders found.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
