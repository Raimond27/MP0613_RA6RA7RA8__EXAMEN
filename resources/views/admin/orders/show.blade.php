@extends('admin.layouts.admin')

@section('title', 'Order Details')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <h1 class="h3 mb-0"><i class="fas fa-shopping-cart"></i> Order Details</h1>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white d-flex align-items-center justify-content-between">
                        <h2 class="h5 mb-0">Order #{{ $order->id }}</h2>
                        <span class="badge bg-success">${{ $order->price }}</span>
                    </div>
                    <div class="card-body">
                        @if(!empty($order->image_url))
                            <div class="text-center mb-4">
                                <img class="img-fluid rounded" src="{{ $order->image_url }}" alt="Order image" style="max-width: 400px; height: auto;">
                            </div>
                        @endif

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="text-muted mb-2">Customer Information</h6>
                                    @if($order->user)
                                        <p class="mb-1"><strong>Name:</strong> {{ $order->user->name }}</p>
                                        <p class="mb-1"><strong>Email:</strong> {{ $order->user->email }}</p>
                                        <p class="mb-0"><strong>Role:</strong> <span class="badge bg-primary">{{ ucfirst($order->user->role) }}</span></p>
                                    @else
                                        <p class="text-muted mb-0">Guest Order</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="text-muted mb-2">Order Information</h6>
                                    <p class="mb-1"><strong>Pizza:</strong> {{ $order->name }}</p>
                                    <p class="mb-1"><strong>Type:</strong> {{ $order->type }}</p>
                                    <p class="mb-1"><strong>Base:</strong> {{ $order->base }}</p>
                                    <p class="mb-0"><strong>Price:</strong> ${{ $order->price }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="p-3 bg-light rounded">
                                <h6 class="text-muted mb-2">Extra Toppings</h6>
                                <ul class="mb-0">
                                    @forelse($order->toppings ?? [] as $topping)
                                        <li>{{ $topping }}</li>
                                    @empty
                                        <li class="text-muted">No extra toppings</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="p-3 bg-light rounded">
                                <h6 class="text-muted mb-2">Order Timeline</h6>
                                <p class="mb-1"><strong>Created:</strong> {{ $order->created_at->format('F d, Y \a\t H:i') }}</p>
                                <p class="mb-0"><strong>Last Updated:</strong> {{ $order->updated_at->format('F d, Y \a\t H:i') }}</p>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash"></i> Delete Order
                                </button>
                            </form>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-list"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
