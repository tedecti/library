<?php

namespace App\Http\Middleware;

use App\Http\Requests\RentalRequest;
use App\Models\Booking;
use App\Models\Rental;
use Closure;

class RentalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(RentalRequest $request, Closure $next)
    {
        $data = $request->validated();
        $existingBooking = Booking::where('book_id', $data['book_id'])->first();
        $existingRental = Rental::where('book_id', $data['book_id'])->first();
        if (!$existingBooking && !$existingRental) {
            return $next($request);
        } else {
            return redirect('books');
        }
    }
}
