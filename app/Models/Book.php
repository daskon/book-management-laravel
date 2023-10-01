<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'auther_id',
        'publisher_id',
        'status'
    ];

    /**
     * Get the category that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    /**
     * Get the publisher that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(publisher::class);
    }

    /**
     * Get the auther that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function auther(): BelongsTo
    {
        return $this->belongsTo(auther::class,'auther_id','id');
    }
}
