<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $worker = Worker::all();

        return $worker;
    }

    public function store(Request $request)
    {
        $request->validate([
            '_token' => 'required',
            'name' => 'required|string',
            'surname' => 'required|string',
            'patronymic' => 'required|string',
            'slug' => 'required|string|unique:workers,slug',
            'callback_data' => 'required|string'
        ]);

        $worker = Worker::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'slug' => $request->slug,
            'callback_data' => $request->callback_data
        ]);

        return redirect()->route('workers.index')->with('success', 'Сотрудник успешно создан.');
    }

    public function show(Worker $worker)
    {
        return view('workers.show', compact('worker'));
    }

    public function edit(Request $request, Worker $worker)
    {
        $worker = Worker::where('id', $worker->id)->first();

        return view('workers.edit', compact('worker'));
    }

    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            '_token' => 'required',
            'name' => 'required|string',
            'surname' => 'required|string',
            'patronymic' => 'required|string',
            'slug' => 'required|string|unique:workers,slug',
            'callback_data' => 'required|string'
        ]);

        $worker->update($request->all());

        return redirect()->route('workers.index')->with('success', 'Сотрудник успешно обновлен.');
    }

    public function delete(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index')
            ->with('success', 'Сотрудник успешно удален.');
    }
}
