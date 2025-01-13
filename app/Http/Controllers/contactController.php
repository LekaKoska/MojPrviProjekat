<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index()
    {
        return view("contact");
    }
    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view("allContacts", compact('allContacts'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            "email" => "required|string", // if(!isset($_POST['email'] && is_string($_POST['email'])
            "subject" => "required|string",
            "description" => "required|min:5"
               ]);

        ContactModel::create([
           "email" => $request->get("email"),
           "subject" => $request->get("subject"),
           "message" => $request->get("description")

        ]);

        return redirect("/shop");
    }

    public function delete($contacts)
    {
        $singleContact = ContactModel::where(['id' => $contacts])->first(); // Query for select all and LIMIT on 1

        if($singleContact === null)
        {
            die("This contact doesn't exist!");
        }

        $singleContact->delete(); // Query for delete

        return redirect()->back();

    }
    public function update(Request $request, ContactModel $singleContact)
    {

        return view("editContact", compact("singleContact"));
    }

    public function save(Request $request,ContactModel $contactId)
    {

        $contactId->email = $request->get("email");
        $contactId->subject = $request->get("subject");
        $contactId->message = $request->get("message");

        $contactId->save();

        return redirect("/admin/all-contacts");

    }

}
