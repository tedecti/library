<?php

namespace App\Services;

use App\Http\Requests\RentalRequest;
use App\Models\Booking;
use App\Models\Rental;
use Illuminate\Support\Facades\DB;

class RentalService
{
    public function create(RentalRequest $request)
    {
        $data = $request->validated();
        $user = auth('user')->user();
        $existingBooking = Booking::where('book_id', $data['book_id'])->first();
        $existingRental = Rental::where('book_id', $data['book_id'])->first();
        if (!$existingBooking && !$existingRental) {
            Rental::create([
                'book_id' => $data['book_id'],
                'user_id' => $user->id,
                'return' => $data['return']
            ]);
        } else {
            return 'Книга уже забронирована или арендована';
        }
    }
}
