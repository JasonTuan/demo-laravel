<?php

namespace App\Services;

use App\Models\ContactGroup;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ContactGroupManagementService
{
    public function createContactGroup(array $data): ContactGroup
    {
        return ContactGroup::create($data);
    }

    public function updateContactGroup(int $id, array $data): ContactGroup
    {
        $contactGroup = ContactGroup::find($id);
        if ($contactGroup === null) {
            abort(404);
        }

        $contactGroup->fill($data);
        $contactGroup->save();
        return $contactGroup;
    }

    public function deleteContactGroup(int $id): void
    {
        $contactGroup = ContactGroup::find($id);
        if ($contactGroup === null) {
            throw new HttpException(404, 'Contact group not found');
            //abort(404);
        }

        $contactGroup->delete();
    }
}
