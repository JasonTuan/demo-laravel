<?php

namespace App\Http\Controllers;

use App\Models\ContactGroup;
use Illuminate\Http\Request;

class ContactGroupController extends Controller
{
    public function index()
    {
        $contactGroups = ContactGroup::all();
        return view('contact-group.index', [
            'contactGroups' => $contactGroups,
        ]);
    }

    public function add()
    {
        return view('contact-group.add', []);
    }

    public function create(Request $request)
    {
        $contactGroup = new ContactGroup();
        $contactGroup->name = $request->get('name');
        $contactGroup->save();
        return redirect()->route('contactGroup.list');
    }

    public function show(int $id)
    {
        $contactGroup = ContactGroup::find($id);
        if ($contactGroup === null) {
            abort(404);
        }

        return view('contact-group.show', [
            'contactGroup' => $contactGroup,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $contactGroup = ContactGroup::find($id);
        if ($contactGroup === null) {
            abort(404);
        }

        $contactGroup->name = $request->get('name');
        $contactGroup->save();

        return redirect()->route('contactGroup.show', ['id' => $id]);
    }

    public function delete(int $id)
    {
        $contactGroup = ContactGroup::find($id);
        if ($contactGroup === null) {
            abort(404);
        }

        $contactGroup->delete();

        return redirect()->route('contactGroup.list');
    }
}
