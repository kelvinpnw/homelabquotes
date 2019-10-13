<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;


class SearchController extends Controller
{

    public function Search(Request $request)
    {
        $query = $request->input('q');
        return view('search', ['Results' => Quote::where('transcript', 'LIKE', '%' . $query . '%')->get(), 'Query' => $query]);
    }
}
