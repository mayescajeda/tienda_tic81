<x-guest-layout>
<<<<<<< HEAD
    <div class="min-h-screen bg-white flex flex-col justify-center py-12 px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="text-center mb-6">

                <h2 class="mt-4 text-2xl font-bold tracking-tight text-gray-900 uppercase">
                    Bienvenido
                </h2>
                <p class="text-sm text-gray-500 mt-2">Ingresa tus credenciales para continuar</p>
            </div>

            <div class="bg-white py-8 px-4 border border-gray-100 shadow-2xl rounded-2xl sm:px-10">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">
                            Correo Electrónico
                        </label>
                        <x-text-input id="email"
                            class="block w-full border-0 bg-gray-50 rounded-xl py-3 px-4 text-gray-900 focus:ring-2 focus:ring-gray-200 transition"
                            type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest">
                                Contraseña
                            </label>
                        </div>
                        <x-text-input id="password"
                            class="block w-full border-0 bg-gray-50 rounded-xl py-3 px-4 text-gray-900 focus:ring-2 focus:ring-gray-200 transition"
                            type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox"
                                class="rounded-md border-gray-200 text-gray-900 focus:ring-0 focus:ring-offset-0 transition"
                                name="remember">
                            <span class="ms-2 text-xs text-gray-500 font-medium">{{ __('Recordarme') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-xs text-gray-400 hover:text-gray-900 transition-colors font-medium text-decoration-none"
                                href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <!-- Action Button -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-gray-900 text-white text-xs font-bold py-4 rounded-xl shadow-lg hover:bg-black hover:-translate-y-0.5 transition-all duration-200 uppercase tracking-widest">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>
            </div>

            <!-- Link de registro opcional -->
            <p class="mt-8 text-center text-xs text-gray-400">
                ¿No tienes una cuenta?
                <a href="{{ route('register') }}" class="font-bold text-gray-900 hover:underline">Regístrate aquí</a>
            </p>
        </div>
    </div>
</x-guest-layout>

<style>
    /* Forzamos que los inputs de Blade no traigan bordes extraños */
    input {
        border: none !important;
    }

    input:focus {
        outline: none !important;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05) !important;
    }
</style>
=======
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf
