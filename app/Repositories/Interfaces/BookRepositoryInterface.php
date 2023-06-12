<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

interface BookRepositoryInterface
{
    public function get(Request $request);
}
