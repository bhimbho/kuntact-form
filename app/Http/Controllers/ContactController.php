<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormStoreRequest;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact-form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormStoreRequest $request)
    {
        $query = Contact::latest()->where('user_id', Auth::id())->first();
        if ($query != null) {
            $diff = $query->created_at->diffInMinutes(Carbon::now()); //get last contact message created by user and get diff with current time
            $wait_time = 5 - $diff; //waiting time

            if ($diff >= 5 || $wait_time == 0) { //check waiting time and time difference
                $this->store_contact($request);
            } else {
                return back()->with('error', 'Kindly wait ' . $wait_time . ' minutes before the next submission');
            }

        } else {
            $this->store_contact($request);
        }
        return back()->with('success', 'Form has been submitted successfully');

    }

    /**
     * Store a newly created message in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_contact($request)
    {
        $file_link = ($request->upload_file) ? $request->upload_file->store('public/uploaded_files') : ''; //store uploaded file and get link path

        Contact::create([
            'name' => $request->fullname,
            'file_name' => $file_link,
            'email' => $request->email,
            'message' => $request->message,
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
