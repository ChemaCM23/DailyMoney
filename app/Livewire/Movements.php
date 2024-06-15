<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class Movements extends Component
{
    public $movements;
    public $categories;
    public $movementId;
    public $type;
    public $category_id;
    public $description;
    public $amount;

    protected $rules = [
        'type' => 'required|in:expense,income',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'amount' => 'required|numeric'
    ];

    public function mount()
    {
        $this->movements = Auth::user()->movements()->latest()->get();
        $this->categories = Category::all();
    }

    public function edit($id)
    {
        $movement = Movement::findOrFail($id);
        $this->movementId = $id;
        $this->type = $movement->type;
        $this->category_id = $movement->category_id;
        $this->description = $movement->description;
        $this->amount = $movement->amount;
    }

    public function update()
    {
        $this->validate();

        $movement = Movement::findOrFail($this->movementId);
        $movement->update([
            'type' => $this->type,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'amount' => $this->amount
        ]);

        // Reset form fields and reload movements
        $this->resetFields();
        $this->movements = Auth::user()->movements()->latest()->get();
    }

    public function delete($id)
    {
        $movement = Movement::findOrFail($id);
        $movement->delete();

        // Reload movements
        $this->movements = Auth::user()->movements()->latest()->get();
    }

    private function resetFields()
    {
        $this->movementId = null;
        $this->type = '';
        $this->category_id = '';
        $this->description = '';
        $this->amount = '';
    }

    public function render()
    {
        return view('livewire.movements');
    }
}
