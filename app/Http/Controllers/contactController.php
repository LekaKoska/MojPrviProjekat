<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class contactController extends Controller
{

    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }
    public function index()
    {
        return view("contact");
    }
    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view("allContacts", compact('allContacts'));
    }

    public function sendContact(SendContactRequest $request)
    {

        $this->contactRepo->createContact($request);

        return redirect("/shop");
    }

    public function delete($contacts)
    {
        $singleContact = $this->contactRepo->getProductId($contacts); // Query for select all and LIMIT on 1

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

        $this->contactRepo->saveContact($request, $contactId);

        return redirect("/admin/all-contacts");

    }

}
