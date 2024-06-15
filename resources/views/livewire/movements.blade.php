<div>
    <h2>Registrar Movimiento</h2>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="type">Tipo:</label>
            <select wire:model="type" id="type">
                <option value="expense">Gasto</option>
                <option value="income">Ingreso</option>
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">Categoría:</label>
            <select wire:model="category_id" id="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" wire:model="description" id="description">
        </div>
        <div class="form-group">
            <label for="amount">Cantidad:</label>
            <input type="number" wire:model="amount" id="amount">
        </div>
        <div class="button-container">
            <button type="submit">Guardar Movimiento</button>
            <a href="{{ route('dashboard') }}" class="btn-secondary">Volver al Dashboard</a>
        </div>
    </form>

    <div class="history-container">
        <h2>Historial de Movimientos</h2>
        <table>
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movements as $movement)
                <tr>
                    <td>{{ $movement->category->name }}</td>
                    <td>{{ $movement->description ?: '-' }}</td>
                    <td>{{ $movement->amount }}</td>
                    <td>{{ $movement->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <button wire:click="edit({{ $movement->id }})">Editar</button>
                        <button wire:click="delete({{ $movement->id }})">Borrar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
