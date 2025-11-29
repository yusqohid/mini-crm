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

                    <x-secondary-button class="mb-3">
                        <a href="{{ route('users.create') }}">
                            {{ __('Create User') }}
                        </a>
                    </x-secondary-button>
                    <div
                        class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                        <table class="w-full text-sm text-left rtl:text-right text-body">
                            <thead class="bg-neutral-secondary-soft border-b border-default">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-medium">Name</th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr
                                        class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                            {{ $user->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Laptop
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="font-medium text-fg-brand hover:underline">Edit</a>
                                            |
                                            <form method='POST' action="{{ route('users.destroy', $user->id) }}"
                                                onsubmit="return confirm('Apakah anda yakin menghapus user ini?')"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-medium text-red-600 hover:underline">Delete</button>
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
