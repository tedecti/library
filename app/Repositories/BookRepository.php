<?php

namespace App\Repositories;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookRepository implements BookRepositoryInterface
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchTerm = $request->input('query');
        $books = Book::join('authors', 'books.author_id', '=', 'authors.id')
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->select('books.name as book_name', 'authors.fio', 'categories.name as category_name', 'year_of_issue', 'isbn')
            ->where(function ($query) use ($searchTerm) {
                $query->where('books.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('authors.fio', 'like', '%' . $searchTerm . '%')
                    ->orWhere('categories.name', 'like', '%' . $searchTerm . '%');
            })
            ->orWhere('isbn', 'like', '%' . $searchTerm . '%')
            ->get();

        return $books;
    }

    public function create(BookRequest $request)
    {
        $data = $request->validated();
        Book::create($data);
        return redirect(route('books'));
    }
}
