<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Crea tu cuenta</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Únete a nuestra comunidad hoy mismo</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre Completo')" class="font-semibold" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <x-text-input id="name"
                    class="block pl-10 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    type="text" name="name" :value="old('name')" required autofocus placeholder="Tu nombre" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="font-semibold" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206">
                        </path>
                    </svg>
                </div>
                <x-text-input id="email"
                    class="block pl-10 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    type="email" name="email" :value="old('email')" required placeholder="email@ejemplo.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="font-semibold" />
                <x-text-input id="password"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar')" class="font-semibold" />
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    type="password" name="password_confirmation" required placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>
        </div>

        <div class="pt-2">
            <x-primary-button
                class="w-full justify-center py-3 text-base font-bold tracking-widest uppercase transition duration-150 ease-in-out transform hover:scale-[1.02] active:scale-[0.98]">
                {{ __('Crear Cuenta') }}
            </x-primary-button>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                ¿Ya tienes una cuenta?
                <a class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 underline decoration-2 underline-offset-4"
                    href="{{ route('login') }}">
                    {{ __('Inicia sesión aquí') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
