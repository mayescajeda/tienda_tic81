@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 text-center">
            <div class="card border-0 shadow-sm p-5" style="border-radius: 30px;">
                <div class="mb-4">
                    <i class="bi bi-bag-check-fill text-success" style="font-size: 5rem;"></i>
                </div>
                
                <h1 class="fw-bold text-dark mb-3">¡Pedido Recibido!</h1>
                <p class="text-muted fs-5">Gracias por tu compra. Tu pedido <span class="fw-bold text-primary">#{{ $order->order_number }}</span> se ha registrado correctamente.</p>

                <div class="alert alert-info border-0 rounded-4 p-4 my-4 text-start">
                    <h5 class="fw-bold"><i class="bi bi-info-circle me-2"></i>Pasos para completar tu pago:</h5>
                    <ol class="mb-0 mt-2">
                        <li>Realiza la transferencia por <strong>${{ number_format($order->total, 2) }}</strong>.</li>
                        <li>Usa el número de pedido <strong>{{ $order->order_number }}</strong> como concepto.</li>
                        <li>Envía el comprobante por WhatsApp al <strong>636-XXX-XXXX</strong>.</li>
                    </ol>
                </div>

                <div class="bg-light p-4 rounded-4 mb-4 text-start">
                    <h6 class="fw-bold text-uppercase small text-muted mb-3">Datos de Transferencia:</h6>
                    <p class="mb-1 text-dark"><strong>Banco:</strong> Banco del Bajío</p>
                    <p class="mb-1 text-dark"><strong>Cuenta:</strong> DVC Clothing / RECENO S DE RL DE CV</p>
                    <p class="mb-1 text-dark"><strong>CLABE:</strong> 0000 0000 0000 0000 00</p>
                </div>

                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="{{ route('home') }}" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold">Seguir Comprando</a>
                    <button onclick="window.print()" class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                        <i class="bi bi-printer me-2"></i>Imprimir Recibo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection