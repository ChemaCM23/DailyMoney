<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">{{ __('¿Olvidaste tu contraseña?') }}</h2>
        <p class="text-sm text-gray-600 mb-6 text-center">
            {{ __('Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.') }}
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-medium mb-2"/>
                <x-text-input id="email" class="block w-full border border-gray-300 rounded-lg p-2" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="text-red-500 mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <x-primary-button class="w-full bg-purple-700 hover:bg-purple-900 text-white py-2 px-4 rounded-lg">
                    {{ __('Resetea la contraseña') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
