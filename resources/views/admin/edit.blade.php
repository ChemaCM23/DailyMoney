<x-app-layout>

    <div class="max-w-md mx-auto p-6 fondoUser overflow-hidden shadow-sm sm:rounded-lg mt-10">
        <form method="post" action="{{ route('admin.update', ['admin' => $user->id]) }}" class="space-y-6">
            @csrf
            @method('PUT')
            <div class=" text-center">
                <h2 class="text-3xl font-bold text-black">Editor de Perfil</h2>
            </div>
            <div class="border rounded-md p-4">
                <div >
                    <label for="name" class="block text-sm font-medium  dark:text-black">Nombre</label>
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-md" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mt-6">
                    <label for="surname" class="block text-sm font-medium  dark:text-black">Apellido</label>
                    <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full rounded-md" :value="old('surname', $user->surname)" required autofocus autocomplete="surname" />
                    <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                </div>

                <div class="mt-6">
                    <label for="phone" class="block text-sm font-medium  dark:text-black">Teléfono</label>
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full rounded-md" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium  dark:text-black">Email</label>
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full rounded-md" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <div class="flex items-center">
                    <x-primary-button>{{ __('Actualizar') }}</x-primary-button>
                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Actualizado correctamente.') }}</p>
                    @endif
                </div>
                <div class="flex items-center">
                    <x-primary-button><a href="{{ route('admin.index') }}">{{ __('Volver') }}</a></x-primary-button>
                </div>

            </div>
        </form>
    </div>

</x-app-layout>

<style>
    .fondoUser {
        background: radial-gradient(#b6b601ba, #62680e);
    }
</style>
