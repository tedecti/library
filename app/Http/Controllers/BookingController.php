<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookingController extends Controller
{
    public function index()
    {
       $books = Book::all();
       return view('booking.index');
    }
}
