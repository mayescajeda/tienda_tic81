@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Encabezado --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-3">
        <div>
            <h2 class="display-6 fw-bold text-dark mb-1">
                <i class="bi bi-tags text-primary me-2"></i> Gestión de Categorías
            </h2>
            <p class="text-secondary mb-0">Organiza los productos de <span class="fw-semibold">DVC Clothing</span> mediante etiquetas.</p>
        </div>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm fw-bold">
            <i class="bi bi-plus-lg me-2"></i> Nueva Categoría
        </a>
    </div>

    {{-- Contenedor de Tabla --}}
    <div class="card shadow-sm border-0 overflow-hidden" style="border-radius: 20px;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="bg-light border-bottom">
                        <th class="px-4 py-4 text-uppercase fs-xs fw-bold text-secondary w-20" style="font-size: 0.75rem; letter-spacing: 0.05em;">ID</th>
                        <th class="px-4 py-4 text-uppercase fs-xs fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.05em;">Nombre</th>
                        <th class="px-4 py-4 text-uppercase fs-xs fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.05em;">Slug / Ruta</th>
                        <th class="px-4 py-4 text-uppercase fs-xs fw-bold text-secondary text-end" style="font-size: 0.75rem; letter-spacing: 0.05em;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr class="border-bottom-0 group">
                            <td class="px-4 py-4">
                                <span class="badge bg-light text-dark border fw-mono px-2 py-1">
                                    #{{ $category->id }}
                                </span>
                            </td>
                            <td class="px-4 py-4">
                                <span class="fw-bold text-dark fs-5">{{ $category->name }}</span>
                            </td>
                            <td class="px-4 py-4">
                                <span class="badge bg-indigo-50 text-primary border border-primary border-opacity-10 rounded-pill px-3 py-2" style="font-size: 0.75rem; background-color: #f0f7ff;">
                                    /{{ $category->slug }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-light text-primary border me-2 rounded-3 fw-bold" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')" class="btn btn-sm btn-light text-danger border rounded-3 fw-bold" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-5 text-center">
                                <div class="py-4">
                                    <i class="bi bi-tag text-muted" style="font-size: 3rem;"></i>
                                    <h3 class="mt-3 h5 fw-bold text-dark">No hay categorías</h3>
                                    <p class="text-secondary">Crea una categoría para organizar mejor tus prendas.</p>
                                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary rounded-pill mt-2">
                                        Crear mi primera categoría
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
    /* Forzar visibilidad de textos */
    .text-dark { color: #1a202c !important; }
    .text-secondary { color: #718096 !important; }
    
    .table thead th {
        background-color: #f8fafc !important;
        border-top: none;
    }

    .table tbody tr:hover {
        background-color: #fdfdfd !important;
    }

    /* Estilo de los Slugs */
    .bg-indigo-50 {
        background-color: #f0f7ff !important;
        color: #0d6efd !important;
    }

    /* Animación suave */
    tr {
        transition: all 0.2s ease;
    }
</style>
@endsection