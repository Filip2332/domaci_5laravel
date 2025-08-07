<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('kontakt'); // Ispravljena putanja
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view("allContacts", compact('allContacts'));
    }

    public function sendContact(SendContactRequest $request)
    {

        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "description" => $request->get("description"),
            "message" => $request->get("message"),
        ]);

        return redirect("/shop");
    }

    public function delete(ContactModel $contact)
    {

        $contact->delete();
        return redirect()->back();
    }
}

