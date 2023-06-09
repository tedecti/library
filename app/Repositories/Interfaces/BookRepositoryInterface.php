<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

interface BookRepositoryInterface
{
    public function search(Request $request);
    public function create(BookRequest $request);
}
