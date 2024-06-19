<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Styling</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Navbar Styles */
        nav {
            background-color: #9d2ffe;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            margin-right: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 30px;
            margin-right: 10px;
            margin-left: 50px;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            margin-right: 20px;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #f8f9fa;
        }

        /* Hamburger Menu */
        .hamburger-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
        }

        .hamburger-icon {
            width: 24px;
            height: 24px;
            fill: #fff;
            transition: transform 0.3s ease;
            margin-right: 50px;
        }

        .hamburger-icon.close {
            transform: rotate(180deg);
        }

        /* Right Navigation */
        .right-nav {
            display: flex;
            align-items: center;
        }

        .right-nav a {
            color: #fff;
            margin-right: 20px;
            transition: color 0.3s ease;
        }

        .right-nav a:hover {
            color: #f8f9fa;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hamburger-btn {
                display: block;
            }

            .responsive-nav-links {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-top: 20px;
            }

            .responsive-nav-links a {
                margin-bottom: 10px;
            }

            .right-nav {
                display: none;
            }
        }
    </style>
</head>

<body>
    <nav x-data="{ open: false }" class="flex justify-between items-center py-4">
        <!-- Logo -->
        <div class=" logo flex justify-start lg:w-0 lg:flex-1">
            <a href="{{ route('dashboard') }}">
                <img style="height: 75px" src="{{ asset('storage/images/logoSinFondo.png') }}"  alt="Logo móvil" class="block lg:hidden ">
                <img style="height: 75px" src="{{ asset('storage/images/logoSinFondo.png') }}"  alt="Logo" class="hidden lg:block ">
            </a>
        </div>

        <!-- Middle Navigation Links -->
        <div class="hidden lg:flex lg:flex-grow lg:items-center lg:justify-center lg:w-1/2">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white text-xl transition-transform transform-gpu hover:-translate-y-1 ">
                {{ __('Inicio') }}
            </x-nav-link>
            <x-nav-link :href="route('movement.index')" :active="request()->routeIs('movement')" class="text-white text-xl transition-transform transform-gpu hover:-translate-y-1 ">
                {{ __('Historial') }}
            </x-nav-link>
            {{--<x-nav-link :href="route('history')" :active="request()->routeIs('history')" class="text-white text-xl transition-transform transform-gpu hover:-translate-y-1 ">
                {{ __('Historial') }}
            </x-nav-link> --}}
            <x-nav-link :href="route('aboutUs')" :active="request()->routeIs('aboutUs')" class="text-white text-xl transition-transform transform-gpu hover:-translate-y-1 ">
                {{ __('Nosotros') }}
            </x-nav-link>
            <x-nav-link :href="route('utilities.index')" :active="request()->routeIs('utilities')" class="text-white text-xl transition-transform transform-gpu hover:-translate-y-1 ">
                {{ __('Utilidades') }}
            </x-nav-link>
            <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="text-white text-xl transition-transform transform-gpu hover:-translate-y-1 ">
                {{ __('Contacto') }}
            </x-nav-link>
            @if (Auth::user()->is_admin == 1)
            <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')" class="text-white text-xl transition-transform transform-gpu hover:-translate-y-1 ">
                {{ __('Panel Admin') }}
            </x-nav-link>
            @endif

        </div>


        <!-- User Navigation -->
        <div class="hidden lg:flex lg:flex-row lg:items-center lg:justify-end lg:flex-1 lg:w-2">
            <x-dropdown align="right" width="48" class="ml-2">
                <x-slot name="trigger">
                    <button>
                        <div class="flex items-center"> <!-- Div para contener el nombre de usuario y la flecha -->
                            <div>{{ Auth::user()->name }}</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Editar Perfil') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Hamburger -->
        <div class="flex lg:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">

                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Inicio') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('movement.index')" :active="request()->routeIs('movement.index')">
                    {{ __('Historial') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('aboutUs')" :active="request()->routeIs('aboutUs')">
                    {{ __('Nosotros') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('utilities.index')" :active="request()->routeIs('utilities')">
                    {{ __('Utilidades') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                    {{ __('Contacto') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="px-4">
                <div>{{ Auth::user()->name }}</div>
                <div>{{ Auth::user()->email }}</div>
            </div>

            <div>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Editar Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </nav>


</body>

</html>
