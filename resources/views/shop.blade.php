@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold">DVC Clothing</h1>
            <p class="lead text-muted">Estilo para cada momento de tu vida.</p>
            <hr class="w-25 mx-auto">
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm border-0 transition-hover">
                    <div style="height: 200px; overflow: hidden;">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 100%; width: 100%;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center h-100">
                                <span class="text-muted">Sin imagen</span>
                            </div>
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">{{ $product->name }}</h5>
                            <span class="badge bg-secondary small">{{ $product->category->name ?? 'General' }}</span>
                        </div>
                        
                        <p class="card-text text-muted small flex-grow-1">
                            {{ Str::limit($product->description, 60) }}
                        </p>

                        <div class="mt-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h4 text-primary mb-0">${{ number_format($product->price, 2) }}</span>
                                <small class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }} fw-bold">
                                    {{ $product->stock > 0 ? 'Stock: ' . $product->stock : 'Agotado' }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-top-0 pb-3">
                        @if($product->stock > 0)
                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-dark w-100 shadow-sm">
                                <i class="bi bi-cart-plus"></i> Agregar al carrito
                            </a>
                        @else
                            <button class="btn btn-secondary w-100" disabled>
                                <i class="bi bi-x-circle"></i> Agotado
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h3>No hay productos disponibles por el momento.</h3>
                <p>Vuelve más tarde o contacta al administrador.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .transition-hover:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
</style>
@endsection