<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentalRequest;
use App\Models\Book;
use App\Models\Booking;
use App\Models\Rental;
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
        $data = $request->validated();
        $existingBooking = Booking::where('book_id', $data['book_id'])->first();
        $existingRental = Rental::where('book_id', $data['book_id'])->first();
        $message = 'Книга уже была забронирована или арендована';
        if(!$existingBooking && !$existingRental){
            $this->rentalService->create($request, $data, auth('user')->user());
            return redirect(route('search'))->with('message', $message);
        } else {
            return redirect('rental')->with('message', $message);
        }
    }
}
