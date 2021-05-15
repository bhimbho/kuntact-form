<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class AdministratorController extends Controller
{
    public function index()
    {
        return view('administrator.view-message')->with('contacts', Contact::all());
    }
}
