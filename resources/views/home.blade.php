@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <strong>{{ __('Dashboard') }}</strong>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="mb-3">{{ __('You are logged in!') }}</p>
                        <div class="d-flex flex-wrap gap-2">
                            <a class="btn btn-outline-primary" href="{{ route('pizzas.index') }}">View All Pizza Orders</a>
                            <a class="btn btn-primary" href="{{ route('order.create') }}">Order a New Pizza</a>
                            <a class="btn btn-light" href="{{ url('/') }}">Goto Welcome Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
