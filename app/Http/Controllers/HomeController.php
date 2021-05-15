<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query = Contact::with('user')
            ->orderBy('id', 'DESC')->get();
        return view('home')->with('contacts', $query);
    }
}
