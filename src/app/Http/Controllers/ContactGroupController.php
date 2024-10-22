<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactGroupRequest;
use App\Models\ContactGroup;
use App\Services\ContactGroupManagementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactGroupController extends Controller
{
    public function index(): View
    {
        $contactGroups = ContactGroup::all();
        return view('contact-group.index', [
            'contactGroups' => $contactGroups,
        ]);
    }

    public function add(): View
    {
        return view('contact-group.add', []);
    }

    public function create(
        ContactGroupRequest $request,
        ContactGroupManagementService $service,
    ): RedirectResponse
    {
        $data = $request->validated();
        $service->createContactGroup($data);
        return redirect()->route('contactGroup.list');
    }

    public function show(int $id): View
    {
        $contactGroup = ContactGroup::find($id);
        if ($contactGroup === null) {
            abort(404);
        }

        return view('contact-group.show', [
            'contactGroup' => $contactGroup,
        ]);
    }

    public function update(
        ContactGroupRequest $request,
        ContactGroupManagementService $service,
        int $id,
    ): RedirectResponse
    {
        $data = $request->validated();
        $service->updateContactGroup($id, $data);

        return redirect()->route('contactGroup.show', ['id' => $id])->with('status', 'Update successful');
    }

    public function delete(
        ContactGroupManagementService $service,
        int $id,
    ): RedirectResponse
    {
        $service->deleteContactGroup($id);
        return redirect()->route('contactGroup.list');
    }
}
