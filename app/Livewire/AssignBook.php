<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Reader;
use App\Models\Setting;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Builder\Function_;

class AssignBook extends Component
{
    use WithPagination;

    public $students;
    public $bookName;
    public $student_id;
    public $book_id;

    public $model_status = false;
    public $add_model_status = false;

    protected $rules = [
        'book_id' => 'required',
        'student_id' => 'required'
    ];

    /**
     * assing Book for readers
     *
     * @return void
     */
    public function assignBook()
    {
        $this->validate();
        try{
            $issue_date = date('Y-m-d');
            $return_date = date('Y-m-d', strtotime("+" . (Setting::latest()->first()->return_days) . " days"));

            BookIssue::create([
                'reader_id' => $this->student_id,
                'book_id' => $this->book_id,
                'issue_date' => $issue_date,
                'return_date' => $return_date,
                'issue_status' => 'N',
            ]);

            Book::where('id',$this->book_id)
                    ->update([
                        'status' => 'N'
                    ]);

            session()->flash('message','Book Assign Successfully!!');
            $this->add_model_status = false;

        }catch(Exception $e){
            session()->flash('message','Something goes wrong while assign book!!');
            $this->add_model_status = false;
        }
    }

    /**
     * return Book
     *
     * @param  mixed $id
     * @return void
     */
    public function returnBook($id)
    {
        try{
            $book = BookIssue::find($id);
            $book->issue_status = 'Y';
            $book->return_day = now();
            $book->save();
            $bookk = Book::find($book->book_id);
            $bookk->status= 'Y';
            $bookk->save();
            session()->flash('message','Book Return Updated Successfully!!');
        }catch(Exception $e){
            session()->flash('message','Something goes wrong while return book!!');
        }
    }

    /**
     * delete Issue book
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteIssue($id)
    {
        BookIssue::where('id', $id)->delete();
        session()->flash('message', 'Book issue deleted successfully.');
    }

    /**
     * open Assign Model
     *
     * @return void
     */
    public function openAddModel()
    {
        $this->add_model_status = true;
        $this->students = Reader::latest()->get();
        $this->bookName = Book::where('status', 'Y')->get();
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
     * assigned List
     *
     * @return void
     */
    public function assignedList()
    {
        return BookIssue::paginate(5);
    }

    public function render()
    {
        return view('livewire.assign-book', [
            'issued' => $this->assignedList()
        ]);
    }
}
