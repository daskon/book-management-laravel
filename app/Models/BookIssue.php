<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'reader_id',
        'book_id',
        'issue_date',
        'return_date',
        'issue_status',
        'return_day'
    ];

    /**
     * Get the student that owns the book_issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reader(): BelongsTo
    {
        return $this->belongsTo(Reader::class, 'reader_id', 'id');
    }

    /**
     * Get the book that owns the book_issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }


    protected $casts = [
        'issue_date' => 'datetime:Y-m-d',
        'return_date' => 'datetime:Y-m-d',
        'return_day' => 'datetime:Y-m-d',
    ];
}
