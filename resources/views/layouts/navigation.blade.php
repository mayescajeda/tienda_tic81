<nav x-data="{ open: false }" class="bg-white border-b border-light-subtle sticky-top shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="transition-transform hover:scale-105 text-decoration-none">
                        <span class="fs-4 fw-bold text-primary" style="letter-spacing: -0.5px;">DVC</span>
                        <span class="fs-4 fw-light text-dark">Clothing</span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')"
                        class="text-decoration-none fw-medium transition-all nav-link-custom">
                        <i class="bi bi-shop me-1"></i> {{ __('Tienda') }}
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')"
                            class="text-decoration-none fw-medium transition-all nav-link-custom">
                            <i class="bi bi-box-seam me-1"></i> {{ __('Productos') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.index')"
                            class="text-decoration-none fw-medium transition-all nav-link-custom">
                            <i class="bi bi-grid-1x2 me-1"></i> {{ __('Categorías') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <a href="{{ route('cart.index') }}"
                    class="btn btn-link position-relative me-3 text-dark text-decoration-none hover-scale">
                    <i class="bi bi-cart3 fs-4"></i>
                    @if (count(session('cart', [])) > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 0.6rem; margin-top: 5px;">
                            {{ count(session('cart', [])) }}
                        </span>
                    @endif
                </a>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-light-subtle text-sm leading-4 font-semibold rounded-full text-gray-600 bg-white hover:bg-gray-50 hover:text-primary focus:outline-none transition duration-200 shadow-sm">
                                <div
                                    class="bg-primary bg-opacity-10 rounded-full w-6 h-6 flex items-center justify-center me-2">
                                    <i class="bi bi-person text-primary" style="font-size: 0.8rem;"></i>
                                </div>
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-3 py-2 text-xs text-muted fw-bold text-uppercase border-bottom mb-1">Cuenta</div>
                            <x-dropdown-link :href="route('profile.edit')" class="rounded-2 mx-1 text-decoration-none">
                                <i class="bi bi-person-gear me-2"></i> {{ __('Perfil') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="rounded-2 mx-1 text-danger text-decoration-none"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i> {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}"
                        class="btn btn-outline-primary btn-sm rounded-pill px-4 fw-bold text-decoration-none">Iniciar
                        Sesión</a>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <a href="{{ route('cart.index') }}" class="me-2 text-dark position-relative">
                    <i class="bi bi-cart3 fs-4"></i>
                    @if (count(session('cart', [])) > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 0.5rem;">
                            {{ count(session('cart', [])) }}
                        </span>
                    @endif
                </a>
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-primary hover:bg-primary hover:bg-opacity-5 focus:outline-none transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden border-t border-light shadow-inner bg-gray-50 bg-opacity-50">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <i class="bi bi-shop me-2"></i> {{ __('Tienda') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')">
                <i class="bi bi-cart3 me-2"></i> {{ __('Mi Carrito') }} ({{ count(session('cart', [])) }})
            </x-responsive-nav-link>
            @auth
                <x-responsive-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')">
                    <i class="bi bi-box-seam me-2"></i> {{ __('Productos') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <div class="pt-4 pb-1 border-t border-light">
            @auth
                <div class="px-4 flex items-center">
                    <div class="shrink-0 me-3 bg-white p-2 rounded-circle border shadow-sm">
                        <i class="bi bi-person text-primary"></i>
                    </div>
                    <div>
                        <div class="font-bold text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-muted">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1 pb-2">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" class="text-danger"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="px-4 py-2">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm w-100">Iniciar Sesión</a>
                </div>
            @endauth
        </div>
    </div>
</nav>

<style>
    .nav-link-custom {
        color: #374151 !important;
        opacity: 1 !important;
    }

    .nav-link-custom:hover {
        color: #0d6efd !important;
    }

    nav .active.nav-link-custom {
        border-bottom-width: 3px !important;
        border-bottom-color: #0d6efd !important;
        color: #0d6efd !important;
        font-weight: 600 !important;
    }

    .hover-scale {
        transition: transform 0.2s ease;
    }

    .hover-scale:hover {
        transform: scale(1.15);
        color: #0d6efd !important;
    }

    .dark\:bg-gray-800,
    .dark\:text-gray-200,
    .dark\:border-gray-700 {
        background-color: transparent !important;
        color: inherit !important;
    }
</style>
