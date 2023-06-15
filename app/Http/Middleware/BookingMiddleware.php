<?php

namespace App\Http\Middleware;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Rental;
use Closure;
use Illuminate\Http\Request;

class BookingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(BookingRequest $bookingRequest, Closure $next)
    {
        $data = $bookingRequest->validated();
        $existingBooking = Booking::where('book_id', $data['book_id'])->first();
        $existingRental = Rental::where('book_id', $data['book_id'])->first();
        if(!$existingBooking && !$existingRental){
            return $next($request);
        } else{
            return redirect(route('books.index'));
        }
    }
}
