<?php

namespace App\Http\Controllers;

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

    public function sendContact(Request $request)
    {
        $request->validate([
            "email" => "required|email", // Ispravljeno
            "subject" => "required|string",
            "description" => "required|string|min:5",
        ]);

        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "description" => $request->get("description"), // Proveri ime kolone u bazi
        ]);

        return redirect("/shop");
    }

    public function delete($contact)
    {
        $singleContact = ContactModel::where('id', $contact)->first();

        if ($singleContact === null) {
            die("Ne postoji ovaj kontakt");
        }

        $singleContact->delete();
        return redirect()->back();
    }
}

