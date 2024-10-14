<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactGroup;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index', [
            'contacts' => Contact::with('contactGroup')->get(),
        ]);
    }

    public function add()
    {
        return view('contact.add', [
            'contactGroups' => ContactGroup::all(),
        ]);
    }

    public function create(Request $request)
    {
        $groupId = $request->get('groupId');
        $group = ContactGroup::find($groupId);
        if ($group === null) {
            abort(404);
        }

        $contact = new Contact();
        $contact->contact_group = $groupId;
        $contact->fullname = $request->get('fullName');
        $contact->email = $request->get('email');
        $contact->tel = $request->get('tel');
        $contact->address = $request->get('address');
        $contact->save();
        return redirect()->route('contact.list');
    }

    public function show(int $id)
    {
        $contact = Contact::find($id);
        if ($contact === null) {
            abort(404);
        }

        return view('contact.show', [
            'contact' => $contact,
            'contactGroups' => ContactGroup::all(),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $contact = Contact::find($id);
        if ($contact === null) {
            abort(404);
        }

        $groupId = $request->get('groupId');
        $group = ContactGroup::find($groupId);
        if ($group === null) {
            abort(404);
        }

        $contact->group_id = $groupId;
        $contact->fullname = $request->get('fullName');
        $contact->email = $request->get('email');
        $contact->tel = $request->get('tel');
        $contact->address = $request->get('address');
        $contact->save();

        return redirect()->route('contact.show', ['id' => $id]);
    }

    public function delete(int $id)
    {
        $contact = Contact::find($id);
        if ($contact === null) {
            abort(404);
        }

        $contact->delete();

        return redirect()->route('contact.list');
    }
}
