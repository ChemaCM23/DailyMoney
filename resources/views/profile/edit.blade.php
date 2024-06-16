<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de Cuenta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Div perfil -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row">
                    <!-- Parte izquierda info -->
                    <div class=" sm:block w-full sm:w-1/2">
                        <div class="max-w-md mx-auto">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                    <!-- Parte derecha del perfil -->
                    <div class="w-full sm:w-1/2 flex justify-center items-center">
                        <img class="h-48 animate-bounce" src="{{ asset('storage/images/logoSinFondo.png') }}" alt="Logo de la página">
                    </div>
                </div>
            </div>

            <!-- Div password -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row">
                    <!-- Parte izquierda con el formulario de cambio de contraseña -->
                    <div class="w-full sm:w-1/2 flex justify-center items-center">
                        <img class="h-48 animate-bounce" src="{{ asset('storage/images/logoSinFondo.png') }}" alt="Logo de la página">
                    </div>
                    <!-- Parte derecha con el formulario de cambio de contraseña -->
                    <div class="w-full sm:w-1/2">
                        <div class="max-w-md mx-auto">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Div delete -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer></x-footer>
