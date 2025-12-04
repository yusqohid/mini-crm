<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tasks
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-500 text-white px-4 py-2 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('tasks.create') }}">
                        <x-secondary-button class="mb-3">
                            {{ __('Add new Task') }}
                        </x-secondary-button>
                    </a>
                    <div
                        class="relative overflow-x-auto bg-white dark:bg-gray-900 shadow rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-300">
                            <thead class="bg-gray-100 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Title</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Assigned to</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Client</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Deadline</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Status</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr
                                        class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900/50 dark:even:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100 whitespace-nowrap">
                                            {{ $task->title }}
                                        </th>
                                        <td class="px-6 py-4">{{ $task->user->name }}</td>
                                        <td class="px-6 py-4">{{ $task->client->company_name }}</td>
                                        <td class="px-6 py-4">{{ $task->deadline_at }}</td>
                                        <td class="px-6 py-4">
                                            @php
                                                $styleMap = [
                                                    'open' => 'success',
                                                    'in progress' => 'warning',
                                                    'blocked' => 'secondary',
                                                    'cancelled' => 'danger',
                                                    'completed' => 'info',
                                                ];
                                            @endphp
                                            <x-badge :style="$styleMap[$task->status]">{{ ucfirst($task->status) }}</x-badge>

                                        </td>
                                        <td class="px-6 py-4">

                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                                class="inline-block px-3 py-1 rounded-md bg-blue-600 text-white text-xs font-medium hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                                                Edit
                                            </a>
                                            @can(\App\Enums\PermissionEnum::DELETE_TASKS->value)
                                                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"
                                                    onsubmit="return confirm('Apakah anda yakin menghapus task ini?')"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-3 py-1 rounded-md bg-red-600 text-white text-xs font-medium hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 transition">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="mt-4">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
