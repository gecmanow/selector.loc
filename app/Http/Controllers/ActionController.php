<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function index()
    {
        $action = Action::all();

        return $action;
    }

    public function store(Request $request)
    {
        $request->validate([
            '_token' => 'required',
            'name' => 'required|string|unique:actions,name',
            'slug' => 'required|string|unique:actions,slug',
            'callback_data' => 'required|string'
        ]);

        $action = Action::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'callback_data' => $request->callback_data
        ]);

        return redirect()->route('actions.index')->with('success', 'Действие успешно создано.');
    }

    public function show(Action $action)
    {
        return view('actions.show', compact('action'));
    }

    public function edit(Request $request, Action $action)
    {
        $action = Action::where('id', $action->id)->first();

        return view('actions.edit', compact('action'));
    }

    public function update(Request $request, Action $action)
    {
        $request->validate([
            '_token' => 'required',
            'name' => 'required|string|unique:actions,name',
            'slug' => 'required|string|unique:actions,slug',
            'callback_data' => 'required|string'
        ]);

        $action->update($request->all());

        return redirect()->route('actions.index')->with('success', 'Действие успешно обновлено.');
    }

    public function delete(Action $action)
    {
        $action->delete();

        return redirect()->route('actions.index')
            ->with('success', 'Действие успешно удалено.');
    }
}
