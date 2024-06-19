<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">{{ __('Reseteo de la contraseña') }}</h2>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-medium mb-2" />
                <x-text-input id="email" class="block w-full border border-gray-300 rounded-lg p-2" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="text-red-500 mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" class="block text-gray-700 font-medium mb-2" />
                <x-text-input id="password" class="block w-full border border-gray-300 rounded-lg p-2" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="text-red-500 mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirma la contraseña')" class="block text-gray-700 font-medium mb-2" />
                <x-text-input id="password_confirmation" class="block w-full border border-gray-300 rounded-lg p-2" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-red-500 mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">
                    {{ __('Resetea la contraseña') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
