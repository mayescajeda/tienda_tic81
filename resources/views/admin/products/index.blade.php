@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">
                    Gestión de Productos
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Visualiza, edita y administra tu inventario actual.
                </p>
            </div>

            <a href="{{ route('admin.products.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg transition-all duration-200 shadow-sm hover:shadow-indigo-200 focus:ring-4 focus:ring-indigo-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Nuevo Producto
            </a>
        </div>

        {{-- Table Card --}}
        <div
            class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700">
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                Producto</th>
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                Precio</th>
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                Categorías</th>
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300 text-right">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @foreach ($products as $product)
                            <tr class="hover:bg-gray-50/80 dark:hover:bg-gray-700/30 transition-colors">
                                <td class="px-6 py-4">
                                    <span class="font-medium text-gray-900 dark:text-white">{{ $product->name }}</span>
                                </td>
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-300 font-mono">
                                    ${{ number_format($product->price, 2) }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($product->categories as $cat)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 border border-blue-200 dark:border-blue-800">
                                                {{ $cat->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="inline-flex items-center space-x-3">
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                            class="text-amber-600 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300 font-semibold text-sm transition-colors">
                                            Editar
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                            class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('¿Estás seguro de eliminar este producto?')"
                                                class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-semibold text-sm transition-colors">
                                                Borrar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($products->isEmpty())
                <div class="py-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No hay productos</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Comienza creando un nuevo producto para tu
                        catálogo.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
