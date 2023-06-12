<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'author_id',
        'category_id',
        'year_of_issue',
        'isbn',
        'availability',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public $timestamps = true;
}
