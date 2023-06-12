<?php

namespace App\Providers;

use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookService
{
    public function create(BookRequest $request)
    {
        $data = $request->validated();
        Book::create($data);
    }
}
