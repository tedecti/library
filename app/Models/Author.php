<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fio',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    public $timestamps = false;
}
