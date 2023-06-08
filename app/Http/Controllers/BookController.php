<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchTerm = $request->input('query');

        $books = Book::join('authors', 'books.author_id', '=', 'authors.id')
        ->where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('authors.fio', 'like', '%' . $searchTerm . '%');
        })
        ->orWhere('isbn', 'like', '%' . $searchTerm . '%')
        ->get();
    
        return view('books', compact('books'));
    }
}
