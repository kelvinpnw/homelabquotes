<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin !== 1)
            abort(403);
        return view('admin/admin_main');
    }

    public function uploadQuote(Request $request)
    {
        if (Auth::user()->admin !== 1)
            abort(403);

        $path = $request->file('screenshot')->store('quotes');
        $pathexploded = explode("/", $path);
        $NewQuote = new Quote;

        $NewQuote->filename = $pathexploded[1];
        $NewQuote->transcript = $request->transcript;
        $NewQuote->tags = "";
        $NewQuote->save();
        echo 'Uploaded at <a href="' . asset($path) . '">' . asset($path) . PHP_EOL . '<br><a href="/admin">return to admin</a>';

    }

    public function showEditPage($id)
    {
        if (Auth::user()->admin !== 1)
            abort(403);
        $Quote = Quote::findOrFail($id);
        return view('admin/admin_edit', compact('Quote'));
    }

    public function submitQuoteUpdate(Request $request, $id)
    {
        if (Auth::user()->admin !== 1)
            abort(403);
        $Quote = Quote::find($id);
        $Quote->transcript = $request->transcript;
        $Quote->save();
        return view('admin/admin_edit', compact('Quote'));
    }

    public function confirmDeletion($id)
    {
        if (Auth::user()->admin !== 1)
            abort(403);
        $Quote = Quote::findOrFail($id);
        return view('admin/admin_delete', compact('Quote'));
    }

    public function deleteQuote(Request $request)
    {
        if (Auth::user()->admin !== 1)
            abort(403);
        $Quote = Quote::find($request->id);
        $Quote->delete();
        return redirect()->route('LandingPage');
    }
}
