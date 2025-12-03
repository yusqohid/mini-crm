<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Projects
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
                        <a href="{{ route('projects.create') }}">
                            {{ __('Add new Client') }}
                        </a>
                    </x-secondary-button>
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
                                        Phone Number</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Company Name</th>
                                    <th scope="col" class="px-6 py-3 font-semibold text-gray-900 dark:text-gray-100">
                                        Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($projects as $project)
                                    <tr
                                        class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900/50 dark:even:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100 whitespace-nowrap">
                                            {{ $project->contact_name }}
                                        </th>
                                        <td class="px-6 py-4">{{ $project->contact_email }}</td>
                                        <td class="px-6 py-4">{{ $project->contact_phone_number }}</td>
                                        <td class="px-6 py-4">{{ $project->company_name }}</td>
                                        <td class="px-6 py-4">

                                            <a href="{{ route('projects.edit', $project->id) }}"
                                                class="inline-block px-3 py-1 rounded-md bg-blue-600 text-white text-xs font-medium hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('projects.destroy', $project->id) }}"
                                                onsubmit="return confirm('Apakah anda yakin menghapus project ini?')"
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
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
