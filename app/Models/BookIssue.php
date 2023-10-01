<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
