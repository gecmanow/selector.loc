<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();

        return $department;
    }

    public function store(Request $request)
    {
        $request->validate([
            '_token' => 'required',
            'name' => 'required|string|unique:departments,name',
            'slug' => 'required|string|unique:departments,slug',
            'callback_data' => 'required|string'
        ]);

        $department = Department::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'callback_data' => $request->callback_data
        ]);

        return redirect()->route('departments.index')->with('success', 'Отдел успешно создан.');
    }

    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Request $request, Department $department)
    {
        $department = Department::where('id', $department->id)->first();

        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            '_token' => 'required',
            'name' => 'required|string|unique:departments,name',
            'slug' => 'required|string|unique:departments,slug',
            'callback_data' => 'required|string'
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Отдел успешно обновлен.');
    }

    public function delete(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Отдел успешно удален.');
    }
}
