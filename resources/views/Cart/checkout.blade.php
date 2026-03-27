@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-5">
        {{-- Columna Izquierda: Formulario de Envío --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 20px;">
                <h2 class="h4 fw-bold text-dark mb-4">
                    <i class="bi bi-truck text-primary me-2"></i>Información de Envío
                </h2>

                {{-- BLOQUE DE ERRORES --}}
                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li><i class="bi bi-exclamation-circle me-2"></i>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label fw-semibold">Nombre(s)</label>
                            <input type="text" class="form-control rounded-pill border-light-subtle bg-light" 
                                   name="first_name" value="{{ old('first_name') }}" required>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label fw-semibold">Apellidos</label>
                            <input type="text" class="form-control rounded-pill border-light-subtle bg-light" 
                                   name="last_name" value="{{ old('last_name') }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Correo Electrónico</label>
                            <input type="email" class="form-control rounded-pill border-light-subtle bg-light" 
                                   value="{{ Auth::user()->email }}" disabled>
                            <small class="text-muted">Usaremos este correo para enviarte el número de guía.</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Dirección Exacta</label>
                            <input type="text" class="form-control rounded-pill border-light-subtle bg-light" 
                                   name="address" value="{{ old('address') }}" placeholder="Calle, número y colonia" required>
                        </div>

                        <div class="col-md-5">
                            <label class="form-label fw-semibold">Ciudad</label>
                            <input type="text" class="form-control rounded-pill border-light-subtle bg-light" 
                                   name="city" value="Nuevo Casas Grandes" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Estado</label>
                            <select class="form-select rounded-pill border-light-subtle bg-light" name="state" required>
                                <option value="Chihuahua">Chihuahua</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">C.P.</label>
                            <input type="text" class="form-control rounded-pill border-light-subtle bg-light" 
                                   name="zip" value="{{ old('zip') }}" required>
                        </div>
                    </div>

                    <hr class="my-5">

                    <h2 class="h4 fw-bold text-dark mb-4">
                        <i class="bi bi-credit-card text-primary me-2"></i>Método de Pago
                    </h2>
                    
                    <div class="bg-light p-3 rounded-4 border border-primary border-opacity-10 mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="transfer" value="transfer" checked>
                            <label class="form-check-label fw-bold text-dark" for="transfer">
                                Transferencia Bancaria / Depósito
                            </label>
                            <p class="small text-muted mb-0">Te enviaremos los datos de la cuenta de DVC Clothing al finalizar tu orden.</p>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-lg w-100 rounded-pill py-3 fw-bold shadow-sm" type="submit">
                        <i class="bi bi-lock-fill me-2"></i>Finalizar Pedido
                    </button>
                </form>
            </div>
        </div>

        {{-- Columna Derecha: Resumen de Compra --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 sticky-top" style="border-radius: 20px; top: 100px;">
                <h3 class="h5 fw-bold text-dark mb-4">Tu Pedido</h3>
                
                <ul class="list-unstyled mb-0">
                    @php $total = 0; @endphp
                    @foreach(session('cart', []) as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <li class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-3 me-2 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; overflow: hidden;">
                                    @if(isset($details['image']))
                                        <img src="{{ asset('storage/'.$details['image']) }}" class="img-fluid" style="object-fit: cover; height: 100%;">
                                    @endif
                                </div>
                                <div>
                                    <h6 class="mb-0 text-dark fw-bold small">{{ Str::limit($details['name'], 20) }}</h6>
                                    <small class="text-muted">Cant: {{ $details['quantity'] }}</small>
                                </div>
                            </div>
                            <span class="text-dark fw-semibold small">${{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                        </li>
                    @endforeach
                </ul>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Subtotal</span>
                    <span class="text-dark fw-semibold">${{ number_format($total, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <span class="text-muted">Envío (Local NCG)</span>
                    <span class="text-success fw-bold">Gratis</span>
                </div>
                
                <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded-4">
                    <span class="h5 mb-0 fw-bold">Total</span>
                    <span class="h4 mb-0 fw-bold text-primary">${{ number_format($total, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection