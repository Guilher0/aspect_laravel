<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApprovalRequest;
use App\Http\Requests\UpdateApprovalRequest;
use App\Models\Approval;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvals = Approval::all();
        return view('admin.approvals.index', compact('approvals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApprovalRequest $request)
    {
        Approval::create($request->validated());

        return redirect()->route('admin.approvals.index')->with('success', 'Aprovação cadastrada com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApprovalRequest $request, string $id)
    {
        $approval = Approval::findOrFail($id);
        $data = $request->validated();

        // If the base64 inputs are empty, we don't want to overwrite existing images with null.
        // We remove them from $data if they weren't provided in the request (e.g. user didn't select a new file)
        if (empty($data['image_base64'])) {
            unset($data['image_base64']);
        }

        if (empty($data['author_image_base64'])) {
            unset($data['author_image_base64']);
        }

        $approval->update($data);

        return redirect()->route('admin.approvals.index')->with('success', 'Aprovação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $approval = Approval::findOrFail($id);
        $approval->delete();

        return redirect()->route('admin.approvals.index')->with('success', 'Aprovação removida com sucesso!');
    }
}
