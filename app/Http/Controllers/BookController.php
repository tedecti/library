<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Repositories\BookRepository;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function search(Request $request)
    {
        $books = $this->bookRepository->search($request);
        return view('books', compact('books'));
    }

    public function showCreate()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('create', compact('authors', 'categories'));
    }

    public function create(BookRequest $bookRequest)
    {
        $data = $bookRequest->validated();
        Book::create($data);
        return redirect('/');
    }
}
