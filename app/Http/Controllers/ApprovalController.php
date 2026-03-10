<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'image_base64' => 'nullable|string',
            'author_image_base64' => 'nullable|string',
            'approval_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        Approval::create($request->all());

        return redirect()->route('admin.approvals.index')->with('success', 'Aprovação cadastrada com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $approval = Approval::findOrFail($id);

        $request->validate([
            'student_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'image_base64' => 'nullable|string',
            'author_image_base64' => 'nullable|string',
            'approval_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['student_name', 'course', 'approval_date', 'description']);

        if ($request->filled('image_base64')) {
            $data['image_base64'] = $request->image_base64;
        }

        if ($request->filled('author_image_base64')) {
            $data['author_image_base64'] = $request->author_image_base64;
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
