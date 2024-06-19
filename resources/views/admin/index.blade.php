<x-app-layout>

    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <style>
        .fondo {
            background: white;
        }

        .table-container {
            border-radius: 20px;
            overflow: hidden;
        }

        .table {
            border-spacing: 0 15px;
            width: 900px;
        }

        i {
            font-size: 1.5rem !important;
        }

        .table tr {
            border-radius: 0;
        }

        tr td:nth-child(n+6),
        tr th:nth-child(n+6) {
            border-radius: 0 .625rem .625rem 0;
        }

        tr td:nth-child(1),
        tr th:nth-child(1) {
            border-radius: .625rem 0 0 .625rem;
        }

        .fondoTitulo {
            background: radial-gradient(#7e00ac, #3e0065);
        }
        .fondoUser {
            background: radial-gradient(#7e00ac, #3e0065);
        }
    </style>

    <div class="fondo flex items-center justify-center mt-5">
        <div class="col-span-12">
            <div class="overflow-auto lg:overflow-visible table-container">
                <table class="table text-white border-separate space-y-6 text-lg">
                    <thead class="fondoTitulo text-white">
                        <tr>
                            <th class="p-5 font-bold text-center">Nombre </th>
                            <th class="p-5 font-bold text-center">Apellido </th>
                            <th class="p-5 font-bold text-center">Email</th>
                            <th class="p-5 font-bold text-center">Registrado</th>
                            <th class="p-5 font-bold text-center">Admin</th>
                            <th></th>
                            <th class="p-5 font-bold text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="fondoUser text-white">
                            <td class="p-3 text-center font-bold">
                                {{ $user->name }}
                            </td>
                            <td class="p-3 text-center font-bold">
                                {{ $user->surname }}
                            </td>
                            <td class="p-3 text-center font-bold">
                                {{ $user->email }}
                            </td>
                            <td class="p-3 text-center font-bold">
                                {{ $user->created_at->format('d/m/Y') }}
                            </td>
                            <td class="p-3 text-center font-bold">
                                {{ $user->is_admin ? 'Sí' : 'No' }}
                            </td>
                            <td></td>
                            <td class="p-3 text-center ">

                                @if (!$user->is_admin)
                                <form action="{{ route('make-admin', ['id' => $user->id]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button>
                                        <i class="material-icons-round text-base hover:text-gray-100">admin_panel_settings</i>
                                </button>
                                </form>
                                @endif

                                <a href="{{ route('admin.edit', ['admin' => $user->id]) }}"
                                    class="text-white hover:text-green-500  mx-2">
                                    <i class="material-icons-outlined text-base">edit</i>
                                </a>
                                <form action="{{ route('admin.destroy', ['admin' => $user->id]) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        <i class="material-icons-round text-base hover:text-red-500">delete_outline</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white fondoLive overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  dark:text-white">
                    @livewire('user-form')

                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>

<style>
    .fondoLive {
        background: radial-gradient(#490188, #480075);
    }
</style>

