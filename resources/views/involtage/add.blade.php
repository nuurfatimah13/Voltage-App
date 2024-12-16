<x-app-layout title="Add Monitoring">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Monitoring') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800 mb-2">Add Data Monitoring</h3>
                    </div>
                </div>

                <form method="POST" action="{{ route('involtage.store') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Location -->
                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                            :value="old('location')" required autocomplete="location" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <!-- Voltage -->
                    <div class="mt-4">
                        <x-input-label for="voltage" :value="__('Voltage')" />
                        <x-text-input id="voltage" class="block mt-1 w-full" type="number" name="voltage"
                            :value="old('voltage')" required autocomplete="voltage" />
                        <x-input-error :messages="$errors->get('voltage')" class="mt-2" />
                    </div>

                    <!-- Information -->
                    <div class="mt-4">
                        <x-input-label for="information" :value="__('Information')" />
                        <x-text-input id="information" class="block mt-1 w-full" type="text" name="information"
                            :value="old('information')" required autocomplete="information" />
                        <x-input-error :messages="$errors->get('information')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-involtage.button-link href="{{ route('involtage.index') }}">
                            Cancel
                        </x-involtage.button-link>
                        <x-primary-button class="ms-4">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
