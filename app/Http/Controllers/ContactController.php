<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepository;
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
        $this->contactRepository = new ContactRepository();
        return redirect("/shop");
    }

    public function delete(ContactModel $contact)
    {

        $contact->delete();
        return redirect()->back();
    }
}

