<?php

namespace App\Livewire;

use App\Models\Auther;
use App\Models\Book as ModelsBook;
use App\Models\Category;
use App\Models\Publisher;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class Book extends Component
{
    use WithPagination;

    public $bookName;
    public $authors;
    public $publishers;
    public $categories;
    public $selectedBook;
    public $model_status = false;
    public $add_model_status = false;

    public $selectedAuth;
    public $selectedPub;
    public $selectedCat;

    public $new_categorie;
    public $new_publisher;
    public $new_auther;

    protected $rules = [
        'bookName' => 'required',
        'new_categorie' => 'required',
        'new_publisher' => 'required',
        'new_auther' => 'required'
    ];

    /**
     * open Model popup
     *
     * @return void
     */
    public function openAddModel()
    {
        $this->add_model_status = true;
        $this->authors = Auther::latest()->get();
        $this->publishers = Publisher::latest()->get();
        $this->categories = Category::latest()->get();
    }

    /**
     * close Model popup
     *
     * @return void
     */
    public function closeModel()
    {
        $this->model_status = false;
        $this->add_model_status = false;
    }

    /**
     * get book data for model popup
     *
     * @param  mixed $book
     * @return void
     */
    public function bookQuery($book)
    {
        $this->model_status = true;
        $this->authors = Auther::latest()->get();
        $this->publishers = Publisher::latest()->get();
        $this->categories = Category::latest()->get();
        $this->selectedBook = $book;
    }

    /**
     * insert new Book
     *
     * @return void
     */
    public function insertBook()
    {
        $this->validate();
        try{
            ModelsBook::create([
                'name' => $this->bookName,
                'auther_id' => $this->new_auther,
                'category_id' => $this->new_categorie,
                'publisher_id' => $this->new_publisher
            ]);
            session()->flash('message','Book Created Successfully!!');
            $this->add_model_status = false;

        }catch(Exception $e){
            session()->flash('message','Something goes wrong while creating book!!');
            $this->add_model_status = false;
        }
    }

    /**
     * set updated category
     *
     * @param  mixed $id
     * @return void
     */
    public function setCat($id)
    {
        $this->selectedCat = $id;
    }

    /**
     * set updated book name
     *
     * @param  mixed $name
     * @return void
     */
    public function setBookName($name)
    {
        $this->bookName = $name;
    }

    /**
     * set updated auther
     *
     * @param  mixed $id
     * @return void
     */
    public function setAuth($id)
    {
        $this->selectedAuth = $id;
    }

    /**
     * set updated publisher
     *
     * @param  mixed $id
     * @return void
     */
    public function setPublisher($id)
    {
        $this->selectedPub = $id;
    }

    /**
     * update Book info
     *
     * @param  mixed $id
     * @return void
     */
    public function updateBook($id)
    {
        $this->bookName = $this->bookName == null ? $this->selectedBook['name'] : $this->bookName;
        $this->selectedCat = $this->selectedCat == null ? $this->selectedBook['category_id'] : $this->selectedCat;
        $this->selectedAuth = $this->selectedAuth == null ? $this->selectedBook['auther_id'] : $this->selectedAuth;
        $this->selectedPub = $this->selectedPub == null ? $this->selectedBook['publisher_id'] : $this->selectedPub;

        $book = ModelsBook::find($id);
        $book->name = $this->bookName;
        $book->auther_id = $this->selectedAuth;
        $book->category_id = $this->selectedCat;
        $book->publisher_id = $this->selectedPub;
        $book->save();

        session()->flash('message', 'Book successfully updated.');

        $this->resetFields();
    }

    /**
     * delete Book info
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteBook($id)
    {
        ModelsBook::where('id', $id)->delete();
        session()->flash('message', 'Book info deleted successfully.');
    }

    /**
     * get list of books
     *
     * @return void
     */
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
