<x-guest-layout>
<<<<<<< HEAD
    <div class="mb-6 text-center">
        <!-- Icono Decorativo -->
        <div
            class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 dark:bg-indigo-900/30 rounded-full mb-4">
            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                </path>
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            {{ __('¿Olvidaste tu contraseña?') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
            {{ __('') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-4 shadow-sm p-3 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800 text-center"
        :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
=======
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf
        @csrf

        <!-- Email Address -->
        <div>
<<<<<<< HEAD
            <x-input-label for="email" :value="__('Correo Electrónico')" class="font-medium text-gray-700 dark:text-gray-300" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206">
                        </path>
                    </svg>
                </div>
                <x-text-input id="email"
                    class="block pl-10 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg transition shadow-sm"
                    type="email" name="email" :value="old('email')" required autofocus placeholder="" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-primary-button
                class="w-full justify-center py-3 text-sm font-bold tracking-widest uppercase transition duration-200 transform hover:-translate-y-0.5 shadow-md">
                {{ __('Enviar enlace de recuperación') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-center mt-6">
            <a class="inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 transition-colors duration-200"
                href="{{ route('login') }}">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                {{ __('Volver al inicio de sesión') }}
            </a>
        </div>
=======
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf
    </form>
</x-guest-layout>
