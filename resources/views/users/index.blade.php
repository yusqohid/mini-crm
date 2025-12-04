<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-500 text-white px-4 py-2 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('users.create') }}">
                        <x-secondary-button class="mb-3">
                            {{ __('Create User') }}
                        </x-secondary-button>
                    </a>
                    <div
                        class="relative overflow-x-auto bg-white dark:bg-gray-900 shadow rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-300">
                            <thead class="bg-gray-100 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Name</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Email</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Roles</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr
                                        class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900/50 dark:even:bg-gray-800 border-b border-gray-200 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100 whitespace-nowrap">
                                            {{ $user->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->getRoleNames()->first() }}
                                        </td>
                                        <td class="px-6 py-4 space-x-2">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="inline-block px-3 py-1 rounded-md bg-blue-600 text-white text-xs font-medium hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                                onsubmit="return confirm('Apakah anda yakin menghapus user ini?')"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 rounded-md bg-red-600 text-white text-xs font-medium hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 transition">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
