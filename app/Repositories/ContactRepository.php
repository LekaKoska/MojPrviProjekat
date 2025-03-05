<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function createContact($request)
    {
        return $this->contactModel->create(["email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("description")]);
    }

    public function getProductId($id)
    {
        return $this->contactModel->where(['id' => $id])->first();
    }

    public function saveContact($contactId, $request)
    {
        $contactId->email = $request->get("email");
        $contactId->subject = $request->get("subject");
        $contactId->message = $request->get("message");

        $contactId->save();

    }
}
