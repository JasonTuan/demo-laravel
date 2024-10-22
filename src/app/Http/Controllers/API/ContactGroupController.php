<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactGroupRequest;
use App\Models\ContactGroup;
use App\Services\ContactGroupManagementService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ContactGroupController extends Controller
{
    public function index(): JsonResponse
    {
        $contactGroups = ContactGroup::all();
        return response()->json($contactGroups);
    }

    public function create(
        ContactGroupRequest $request,
        ContactGroupManagementService $service,
    ): JsonResponse
    {
        $data = $request->validated();
        $contactGroup = $service->createContactGroup($data);
        return response()->json($contactGroup);
    }

    public function show(int $id): JsonResponse
    {
        $contactGroup = ContactGroup::find($id);
        if ($contactGroup === null) {
            abort(404);
        }

        return response()->json($contactGroup);
    }

    public function update(
        ContactGroupRequest $request,
        ContactGroupManagementService $service,
        int $id,
    ): JsonResponse
    {
        $data = $request->validated();
        $contactGroup = $service->updateContactGroup($id, $data);

        return response()->json($contactGroup);
    }

    public function delete(
        ContactGroupManagementService $service,
        int $id,
    ): JsonResponse
    {
        try {
            $service->deleteContactGroup($id);
            return response()->json(null, 204);
        } catch (HttpException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
