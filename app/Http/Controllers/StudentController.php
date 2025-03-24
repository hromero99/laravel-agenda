<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active == "on" ? 1 : 0,
        ]);
        return redirect()->route('students');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
