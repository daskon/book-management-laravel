<?php

namespace App\Livewire;

use App\Models\Reader;
use Livewire\Component;
use Livewire\WithPagination;

class ReadersList extends Component
{
    use WithPagination;

    public function getList()
    {
        return Reader::paginate(5);
    }

    public function render()
    {
        return view('livewire.readers-list', [
            'readers' => $this->getList()
        ]);
    }
}
