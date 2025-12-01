<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('clients.update', $client->id) }}">
                        @method('PATCH')
                        @csrf

                        <!-- Contact Name -->
                        <div class="mt-4">
                            <x-input-label for="contact_name" :value="__('Contact Name')" />
                            <x-text-input id="contact_name" name="contact_name" type="text" class="block mt-1 w-full"
                                :value="old('contact_name', $client->contact_name)" required autofocus autocomplete="contact_name" />
                            <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                        </div>

                        <!-- Contact Email -->
                        <div class="mt-4">
                            <x-input-label for="contact_email" :value="__('Contact Email')" />
                            <x-text-input id="contact_email" name="contact_email" type="email"
                                class="block mt-1 w-full" :value="old('contact_email', $client->contact_email)" required autocomplete="contact_email" />
                            <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                        </div>

                        <!-- Contact Phone Number -->
                        <div class="mt-4">
                            <x-input-label for="contact_phone_number" :value="__('Contact Phone Number')" />
                            <x-text-input id="contact_phone_number" name="contact_phone_number" type="text"
                                class="block mt-1 w-full" :value="old('contact_phone_number', $client->contact_phone_number)" required autocomplete="tel" />
                            <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
                        </div>

                        <!-- Company Name -->
                        <div class="mt-4">
                            <x-input-label for="company_name" :value="__('Company Name')" />
                            <x-text-input id="company_name" name="company_name" type="text" class="block mt-1 w-full"
                                :value="old('company_name', $client->company_name)" required autocomplete="organization" />
                            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                        </div>

                        <!-- Company Address -->
                        <div class="mt-4">
                            <x-input-label for="company_address" :value="__('Company Address')" />
                            <textarea id="company_address" name="company_address"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                                required>{{ old('company_address', $client->company_address) }}</textarea>
                            <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                        </div>

                        <!-- Company City -->
                        <div class="mt-4">
                            <x-input-label for="company_city" :value="__('Company City')" />
                            <x-text-input id="company_city" name="company_city" type="text" class="block mt-1 w-full"
                                :value="old('company_city', $client->company_city)" required autocomplete="address-level2" />
                            <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                        </div>

                        <!-- Submit -->
                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="ms-4">
                                {{ __('Save Client') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
