<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('Tarefas') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            {{-- Filtro e Botão --}}
            <div class="mb-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <form method="GET" action="{{ route('tasks') }}" class="flex flex-wrap items-center gap-2 w-full">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar título..."
                        class="px-4 py-2 border rounded shadow-sm focus:ring focus:ring-blue-200 w-full md:w-auto" />

                    <select name="statuses_id"
                        class="px-4 py-2 border rounded shadow-sm focus:ring focus:ring-blue-200 w-full md:w-auto">
                        <option value="">Status</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ request('statuses_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 transition w-full md:w-auto">
                        Buscar
                    </button>

                    <a href="{{ route('tasks') }}"
                        class="text-sm text-gray-600 hover:underline hover:text-gray-900 w-full md:w-auto text-center">
                        Limpar
                    </a>
                </form>

                <a href="{{ route('tasks.create') }}"
                    class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 text-center w-full md:w-auto">
                    Adicionar Nova Tarefa
                </a>
            </div>

            {{-- Alerta --}}
            @if(session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
                    class="p-4 mb-4 text-green-800 bg-green-200 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tabela --}}
            <div class="bg-white shadow sm:rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Título</th>
                            @if(auth()->id() === 1)
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Usuário</th>
                            @endif
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Criado em</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($tasks as $task)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $task->title }}</td>
                                @if(auth()->id() === 1)
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $task->user->name ?? '' }}</td>
                                @endif
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $task->status->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ format_date($task->created_at, 'd/m/Y H:i:s') }}</td>
                                <td class="px-6 py-4 space-x-2 text-sm">
                                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:underline">Editar</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block"
                                        onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Nenhuma tarefa encontrada.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $tasks->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
