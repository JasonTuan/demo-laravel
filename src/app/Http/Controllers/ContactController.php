<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ContactGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index', [
            'contacts' => Contact::with('contactGroup')->get(),
        ]);
    }

    public function add(): View
    {
        return view('contact.add', [
            'contactGroups' => ContactGroup::all(),
        ]);
    }

    public function create(ContactRequest $request): RedirectResponse
    {
        $request->validated();

        $contact = Contact::create($request->all());
        $contact->contactGroup()
            ->associate(ContactGroup::find($request->get('groupId')));
        $contact->save();

        return redirect()->route('contact.list');
    }

    public function show(int $id): View
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

    public function update(ContactRequest $request, int $id): RedirectResponse
    {
        $contact = Contact::find($id);
        if ($contact === null) {
            abort(404);
        }

        $contact->fill($request->all());
        $contact->contactGroup()
            ->associate(ContactGroup::find($request->get('groupId')));
        $contact->save();

        return redirect()->route('contact.show', ['id' => $id])->with('status', 'Update successful');
    }

    public function delete(int $id): RedirectResponse
    {
        $contact = Contact::find($id);
        if ($contact === null) {
            abort(404);
        }

        $contact->delete();

        return redirect()->route('contact.list');
    }
}
