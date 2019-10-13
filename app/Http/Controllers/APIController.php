<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;

class APIController extends Controller
{
    public function GetAllQuotes()
    {
        return response()->json(Quote::select(['filename', 'transcript'])->get());
    }
}
