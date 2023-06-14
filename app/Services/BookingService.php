<?php

namespace App\Services;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function create(BookingRequest $request)
    {
        $data = $request->validated();
        $user = auth('user')->user();
        $existingBooking = Booking::where('book_id', $data['book_id'])->first();
        if (!$existingBooking) {
            Booking::create([
                'book_id' => $data['book_id'],
                'user_id' => $user->id,
            ]);
        } else {
            return 'Книга уже забронирована';
        }
    }
}
