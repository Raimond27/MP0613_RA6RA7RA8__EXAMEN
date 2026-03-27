@extends('layouts.app')

@section('title', 'Order Detail')

@section('content')
    <div class="pizza-detail-background">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex align-items-center justify-content-between">
                        <h2 class="h5 mb-0">Order for <span class="text-danger">{{ $order->name }}</span></h2>
                        <span class="badge bg-light text-dark">#{{ $order->id }}</span>
                    </div>
                    <div class="card-body">
                        @if(!empty($order->image_url))
                            <div class="text-center mb-4">
                                <img class="img-fluid rounded" src="{{ $order->image_url }}" alt="Order image" style="max-width: 320px; height: auto;">
                            </div>
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <p class="mb-1"><strong>User ID:</strong> {{ $order->user_id }}</p>
                                    <p class="mb-1"><strong>Type:</strong> {{ $order->type }}</p>
                                    <p class="mb-1"><strong>Base:</strong> {{ $order->base }}</p>
                                    <p class="mb-0"><strong>Price:</strong> {{ $order->price }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <p class="mb-1"><strong>Extra toppings:</strong></p>
                                    <ul class="mb-0">
                                        @foreach($order->toppings ?? [] as $topping)
                                            <li>{{ $topping }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-check"></i> Cancel order</button>
                            </form>
                            <a class="btn btn-outline-secondary" href="{{ route('order.index') }}">Back to orders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
