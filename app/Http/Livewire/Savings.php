<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Saving;
use App\Models\User;

class Savings extends Component
{
    public $amount;
    public $showCreateModal = false;

    public function create() {
        $this->showCreateModal = true;
    }

    public function storeSaving()
    {
        $this->validate([
            'amount' => 'required',
        ]);

        $saving = new Saving();
        $saving->amount = $this->amount;
        $saving->user_id = auth()->user()->id;
        // dd($saving);
        $saving->save();

        $this->showCreateModal = false;
    }

    public function render()
    {
        return view('livewire.savings');
    }
}
