@extends('layouts.app')

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

@section('content')
    <div class="container-fluid py-5 bg-white min-vh-100">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <!-- Card con bordes suaves y sombra ligera para resaltar sobre el fondo blanco -->
                <div class="card border border-light-subtle shadow-sm rounded-4">

                    <!-- Encabezado Limpio -->
                    <div class="card-header bg-white py-4 border-bottom border-light">
                        <h3 class="fw-bold text-dark mb-0 d-flex align-items-center">
                            <span class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                                <i class="bi bi-box-seam text-primary"></i>
                            </span>
                            Registrar Producto
                        </h3>
                        <p class="text-muted small mb-0 mt-2">Completa los campos para añadir un nuevo artículo al
                            inventario.</p>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('admin.products.store') }}" method="POST">
                            @csrf

                            <div class="row g-4">
                                <!-- Columna Izquierda -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Producto:</label>
                                        <input type="text" name="name"
                                            class="form-control form-control-lg custom-input" placeholder="" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Precio de venta:</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white text-muted border-end-0">$</span>
                                            <input type="number" step="0.01" name="price"
                                                class="form-control border-start-0 custom-input" placeholder="0.00"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Columna Derecha -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold d-flex justify-content-between">
                                            Categorías
                                            <span class="badge bg-light text-dark fw-normal border">Multiselección</span>
                                        </label>
                                        <select name="categories[]" class="form-select custom-select shadow-none" multiple
                                            required style="height: 142px;">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" class="py-2 px-3 rounded-2 mb-1">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Descripción -->
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Descripción del producto:</label>
                                        <textarea name="description" class="form-control custom-input" rows="4" placeholder=""></textarea>
                                    </div>
                                </div>

                                <!-- Footer del Formulario -->
                                <div class="col-12 border-top pt-4 mt-2 d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.products.index') }}"
                                        class="btn btn-link text-decoration-none text-muted fw-medium">
                                        <i class="bi bi-arrow-left me-1"></i> Volver al listado
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg px-5 rounded-3 shadow-sm">
                                        Guardar Producto
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-input,
        .custom-select {
            border: 1px solid #e9ecef !important;
            background-color: #fcfcfc !important;
            transition: all 0.2s ease-in-out;
        }

        .custom-input:focus,
        .custom-select:focus {
            border-color: #0d6efd !important;
            background-color: #ffffff !important;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.08) !important;
        }

        .form-select option {
            margin-bottom: 2px;
            transition: background 0.2s;
        }

        .form-select option:checked {
            background: #0d6efd linear-gradient(0deg, #0d6efd 0%, #0d6efd 100%) !important;
            color: white !important;
        }

        .rounded-4 {
            border-radius: 1rem !important;
        }

        /* Eliminar el fondo gris de la app original si existe */
        body {
            background-color: #ffffff !important;
        }
    </style>
@endsection
