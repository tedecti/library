<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\BookingRequest;
use App\Models\Book;
use App\Models\User;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
    public function index()
    {
       $books = Book::all();
       return view('booking.index', compact('books'));
    }

    public function create(BookingRequest $request)
    {
        $this->bookingService->create($request);
        return redirect(route('search'));
    }
}
