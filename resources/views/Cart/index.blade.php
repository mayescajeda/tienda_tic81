@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4"><i class="bi bi-cart3"></i> Tu Carrito de Compras</h2>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th style="width: 150px;">Cantidad</th>
                        <th>Subtotal</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/'.$details['image']) }}" width="50" height="50" class="rounded me-3" style="object-fit: cover;">
                                    <strong>{{ $details['name'] }}</strong>
                                </div>
                            </td>
                            <td>${{ number_format($details['price'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" 
                                           class="form-control form-control-sm me-2" min="1" max="{{ $details['stock'] }}">
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-clockwise"></i></button>
                                </form>
                            </td>
                            <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                            <td class="text-center">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row mt-4 justify-content-end">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <strong>${{ number_format($total, 2) }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3 text-muted">
                            <span>IVA (16%):</span>
                            <span>${{ number_format($total * 0.16, 2) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="h5">Total:</span>
                            <span class="h5 text-primary">${{ number_format($total * 1.16, 2) }}</span>
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100 mb-2">Seguir comprando</a>
                        <a href="{{ route('cart.checkout') }}" class="btn btn-success w-100">Proceder al Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-cart-x display-1 text-muted"></i>
            <p class="mt-3 fs-5">Tu carrito está vacío.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Volver a la tienda</a>
        </div>
    @endif
</div>
@endsection