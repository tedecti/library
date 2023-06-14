<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentalRequest;
use App\Models\Book;
use App\Services\RentalService;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    private $rentalService;

    public function __construct(RentalService $rentalService)
    {
        $this->rentalService = $rentalService;
    }
    public function index()
    {
       $books = Book::all();
       return view('rental.index', compact('books'));
    }

    public function create(RentalRequest $request)
    {
        $this->rentalService->create($request);
        return redirect(route('search'));
    }
}
