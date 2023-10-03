<?php

namespace App\Livewire;

use Livewire\Component;

class ReaderDashboard extends Component
{
    public $reader_id;
    protected $queryString = ['reader_id'];

    public function render()
    {
        return view('livewire.reader-dashboard',[
            'id' => $this->reader_id
        ])->layout('layouts.guest');
    }
}
