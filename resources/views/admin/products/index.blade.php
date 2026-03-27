@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Header Section --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-3">
        <div>
            <h2 class="display-6 fw-bold text-dark mb-1">
                <i class="bi bi-box-seam text-primary me-2"></i> Gestión de Productos
            </h2>
            <p class="text-secondary mb-0">
                Visualiza, edita y administra el inventario de <span class="fw-semibold">DVC Clothing</span>.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm fw-bold">
            <i class="bi bi-plus-lg me-2"></i> Nuevo Producto
        </a>
    </div>

    {{-- Table Card --}}
    <div class="card shadow-sm border-0 overflow-hidden" style="border-radius: 20px;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="bg-light border-bottom">
                        <th class="px-4 py-4 text-uppercase fs-xs fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.05em;">Producto</th>
                        <th class="px-4 py-4 text-uppercase fs-xs fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.05em;">Precio</th>
                        <th class="px-4 py-4 text-uppercase fs-xs fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.05em;">Categorías</th>
                        <th class="px-4 py-4 text-uppercase fs-xs fw-bold text-secondary text-end" style="font-size: 0.75rem; letter-spacing: 0.05em;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr class="border-bottom-0">
                            <td class="px-4 py-4">
                                <div class="d-flex align-items-center">
                                    {{-- Miniatura de imagen si existe --}}
                                    <div class="bg-light rounded-3 me-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; overflow: hidden;">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="object-fit: cover; height: 100%;">
                                        @else
                                            <i class="bi bi-image text-muted"></i>
                                        @endif
                                    </div>
                                    <span class="fw-bold text-dark fs-5">{{ $product->name }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <span class="fw-semibold text-dark fs-5">${{ number_format($product->price, 2) }}</span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($product->categories as $cat)
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 rounded-pill px-3 py-2" style="font-size: 0.7rem;">
                                            {{ $cat->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-4 py-4 text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-light text-primary border me-2 rounded-3 fw-bold">
                                        <i class="bi bi-pencil-square me-1"></i> Editar
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este producto?')" class="btn btn-sm btn-light text-danger border rounded-3 fw-bold">
                                            <i class="bi bi-trash me-1"></i> Borrar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-5 text-center">
                                <div class="py-4">
                                    <i class="bi bi-box2 text-muted" style="font-size: 3rem;"></i>
                                    <h3 class="mt-3 h5 fw-bold text-dark">No hay productos disponibles</h3>
                                    <p class="text-secondary">Comienza creando un nuevo producto para tu catálogo.</p>
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary rounded-pill mt-2">
                                        Crear mi primer producto
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .text-dark { color: #1a202c !important; }
    .text-secondary { color: #718096 !important; }
    
    .table thead th {
        background-color: #f8fafc !important;
        border-top: none;
    }

    .table tbody tr:hover {
        background-color: #fdfdfd !important;
    }

    .btn-light:hover {
        background-color: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
    }

    tr {
        transition: all 0.2s ease;
    }
</style>
@endsection