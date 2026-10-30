<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('students')->get();

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dept_name' => 'required|string|max:255',
            'manager_id' => 'nullable|integer',
            'location_id' => 'nullable|integer',
        ]);

        Department::create($request->only([
            'dept_name',
            'manager_id',
            'location_id'
        ]));

        return redirect()->route('departments.index')
            ->with('success', 'Department created successfully!');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dept_name' => 'required|string|max:255',
            'manager_id' => 'nullable|integer',
            'location_id' => 'nullable|integer',
        ]);

        $department = Department::findOrFail($id);

        $department->update($request->only([
            'dept_name',
            'manager_id',
            'location_id'
        ]));

        return redirect()->route('departments.index')
            ->with('success', 'Department updated successfully!');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Department deleted successfully!');
    }
}