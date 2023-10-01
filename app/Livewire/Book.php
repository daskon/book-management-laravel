<?php

namespace App\Livewire;

use App\Models\Auther;
use App\Models\Book as ModelsBook;
use App\Models\Category;
use App\Models\Publisher;
use Livewire\Component;
use Livewire\WithPagination;

class Book extends Component
{
    use WithPagination;

    public $authors;
    public $publishers;
    public $categories;
    public $selectedBook;
    public $model_status = false;

    public $selectedAuth;
    public $selectedPub;
    public $selectedCat;

    public $cat_id;
    public $auth_id;
    public $pub_id;

    public function closeModel()
    {
        $this->model_status = false;
    }

    public function bookQuery($book)
    {
        $this->model_status = true;
        $this->authors = Auther::latest()->get();
        $this->publishers = Publisher::latest()->get();
        $this->categories = Category::latest()->get();
        $this->selectedBook = $book;
    }

    public function updateBook($id)
    {dd($this->selectedAuth);
        $book = ModelsBook::find($id);
        $book->name = $this->selectedBook['name'];
        $book->auther_id = $this->auth_id;
        $book->category_id = $this->cat_id;
        $book->publisher_id = $this->pub_id;
        $book->save();
    }

    public function booksList()
    {
        return ModelsBook::paginate(5);
    }

    public function render()
    {
        return view('livewire.book', [
                    'books' => $this->booksList(),
                    'categories' => $this->categories
                ]);
    }
}
