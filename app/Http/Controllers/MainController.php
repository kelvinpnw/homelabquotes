<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;

class MainController extends Controller
{
    public function main()
    {
        return view('index', ['StartQuote' => Quote::inRandomOrder()->first()]);
    }

}
