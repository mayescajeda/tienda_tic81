<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Bienvenid') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Mensaje de Bienvenida -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8 text-white">
                    <h3 class="text-2xl font-bold mb-2">¡Hola de nuevo, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-indigo-100 italic">
                        {{ __('Nos alegra verte. Aquí tienes un resumen de lo que está pasando hoy.') }}</p>
                </div>
            </div>

            <!-- Grid de Estadísticas Rápidas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-lg text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="Group-Icon-Path-Here"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Actividad reciente</p>
                            <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">12 Nuevos</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="Check-Icon-Path-Here"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tareas completadas</p>
                            <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">85%</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 (Acción rápida) -->
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">¿Necesitas ayuda?</p>
                        <a href="#" class="text-indigo-600 dark:text-indigo-400 font-medium hover:underline">Ir a
                            soporte →</a>
                    </div>
                </div>
            </div>

            <!-- Contenedor de Contenido Principal -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <h4 class="text-lg font-semibold mb-4">Próximos pasos</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center text-sm">
                            <span class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></span>
                            Configura tu perfil de usuario.
                        </li>
                        <li class="flex items-center text-sm text-gray-500">
                            <span class="w-2 h-2 bg-gray-300 rounded-full mr-3"></span>
                            Revisa las últimas notificaciones.
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
