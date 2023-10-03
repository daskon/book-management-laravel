<?php

namespace App\Livewire;

use App\Models\BookIssue;
use App\Models\Reader;
use Livewire\Component;
use Livewire\WithPagination;

class BorrowBook extends Component
{
    use WithPagination;

    public $id;
    protected $queryString = ['id'];

    /**
     * get Borrow Boook List
     *
     * @return void
     */
    public function getBorrowList()
    {
        $reader_id = Reader::where('reg_no', $this->id)->value('id');
        return BookIssue::where('reader_id', $reader_id)->paginate(5);
    }

    public function render()
    {
        return view('livewire.borrow-book',[
            'books' => $this->getBorrowList()
        ])->layout('layouts.reader');
    }
}