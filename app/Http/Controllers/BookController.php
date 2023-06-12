<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Providers\BookService;
use App\Repositories\BookRepository;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookRepository;
    private $bookService;

    public function __construct(BookRepository $bookRepository, BookService $bookService)
    {
        $this->bookRepository = $bookRepository;
        $this->bookService = $bookService;
    }

    public function search(Request $request)
    {
        $books = $this->bookRepository->get($request);
        return view('books', compact('books'));
    }

    public function showCreate()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('create', compact('authors', 'categories'));
    }

    public function create(BookRequest $request)
    {
        $this->bookService->create($request);
        return redirect('/');
    }
}
