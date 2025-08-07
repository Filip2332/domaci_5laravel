<?php

namespace App\repositories;


use App\Models\ContactModel;


class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function createNew($request){
        $this->contactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "description" => $request->get("description"),
            "message" => $request->get("message"),
        ]);
    }

}
