<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\BookingRequest;
use App\Models\Book;
use App\Models\Booking;
use App\Models\Rental;
use App\Models\User;
use App\Services\BookingService;

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
        $data = $request->validated();
        $existingBooking = Booking::where('book_id', $data['book_id'])->first();
        $existingRental = Rental::where('book_id', $data['book_id'])->first();
        $message = 'Книга уже была забронирована или арендована';
        
        if (!$existingBooking && !$existingRental) {
            $this->bookingService->create($request, $data, auth('user')->user());
            return redirect(route('search'))->with('message', $message);
        } else {
            return redirect('booking')->with('message', $message);
        }
    }
    
}
