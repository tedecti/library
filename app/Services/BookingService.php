<?php

namespace App\Services;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function create(BookingRequest $request, array $data, User $user)
    {
        Booking::create([
            'book_id' => $data['book_id'],
            'user_id' => $user->id,
        ]);
    }
}
