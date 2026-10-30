<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::with('department')
            ->when($request->search, function ($query, $search) {
                $query->where('student_name', 'like', "%{$search}%");
            })
            ->when($request->gender, function ($query, $gender) {
                $query->where('gender', $gender);
            })
            ->when($request->dept_id, function ($query, $dept_id) {
                $query->where('dept_id', $dept_id);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $departments = Department::all();

        return view('students.index', compact(
            'students',
            'departments'
        ));
    }

    public function create()
    {
        $departments = Department::all();

        return view('students.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'gender' => 'required|in:Male,Female',
            'dob' => 'nullable|date',
            'enrollment' => 'nullable|string|max:100',
            'enrollment_date' => 'required|date',
            'description' => 'nullable|string',
            'dept_id' => 'required|exists:departments,dept_id',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $departments = Department::all();

        return view('students.edit', compact(
            'student',
            'departments'
        ));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id . ',student_id',
            'gender' => 'required|in:Male,Female',
            'dob' => 'nullable|date',
            'enrollment' => 'nullable|string|max:100',
            'enrollment_date' => 'required|date',
            'description' => 'nullable|string',
            'dept_id' => 'required|exists:departments,dept_id',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function show($id)
    {
        $student = Student::with('department')->findOrFail($id);

        return view('students.show', compact('student'));
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}