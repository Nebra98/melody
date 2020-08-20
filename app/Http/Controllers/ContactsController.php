<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
        ]);

        $contact = new Contact();

        $contact->message = $request->input('message');
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');

        if($contact->save()){
            $request->session()->flash('success', "Uspješno ste poslali poruku");
        }else{
            $request->session()->flash('error', 'Došlo je do pogreške tokom slanja poruke!');
        }

        // return redirect('/contact');
        return redirect()->route('contacts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contacts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contacts)
    {
        //
    }
}
