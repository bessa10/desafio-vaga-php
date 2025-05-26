<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(Request $request)
    {
        $statuses = Status::all();

        $query = Task::with('status');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('statuses_id')) {
            $query->where('statuses_id', '=', $request->statuses_id);
        }

        /*
        * Caso o usuário logado for o admin, ele tem permissão para ver todas as tasks.
        * Caso contrário, o usuário logado irá ver apenas as tasks atribuídas a ele
        */
        if(auth()->id() != 1) {
            $query->where('user_id', '=', auth()->id());
        }

        $tasks = $query->latest()->paginate(10);

        return view('tasks.index', compact('tasks', 'statuses'));
    }

    public function create()
    {
        $statuses   = Status::where('id', '<>', '3')->get();
        $users      = User::orderBy('name')->get();

        return view('tasks.create', compact('statuses', 'users'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'statuses_id'   => 'required|exists:statuses,id',
        ];

        /*
        * Caso o usuário logado for o admin, iremos validar o usuário selecionado no formulário
        */
        if(auth()->id() == 1) {
            $rules['user_id'] = 'required|exists:users,id';
        }

        $validated = $request->validate($rules);

        if(auth()->id() != 1) {
            $validated['user_id'] = auth()->id();
        }

        Task::create($validated);

        return redirect()->route('tasks')->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(Task $task)
    {
        $statuses = Status::all();

        return view('tasks.edit', compact('task', 'statuses'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'statuses_id'   => 'required|exists:statuses,id',
        ]);

        $task->update($validated);

        return redirect()->route('tasks')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks')->with('success', 'Tarefa deletada com sucesso!');
    }
}
