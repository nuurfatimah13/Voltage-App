<x-app-layout title="Monitoring">
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
                        <h3 class="text-lg font-bold text-slate-800 mb-2">Manage your Monitoring</h3>
                        <x-involtage.button-link type="add" href="{{ route('involtage.create') }}">
                            Add Data
                        </x-involtage.button-link>
                    </div>
                    <div class="ml-3">
                        <div class="w-full max-w-sm min-w-[200px] relative">
                            <form action="{{ route('involtage.index') }}" method="GET">
                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                                        placeholder="Search by name, location, or voltage..." />
                                    <button
                                        class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                                        type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="3" stroke="currentColor" class="w-8 h-8 text-slate-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div
                    class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-normal leading-none text-slate-500">
                                        No
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-normal leading-none text-slate-500">
                                        Name
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-normal leading-none text-slate-500">
                                        Location
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-normal leading-none text-slate-500">
                                        Voltage
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-normal leading-none text-slate-500">
                                        Information
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-normal leading-none text-slate-500">
                                        Action
                                    </p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($involtages as $involtage)
                                <tr class="hover:bg-slate-50 border-b border-slate-200">
                                    <td class="p-4 py-5">
                                        <p class="block font-semibold text-sm text-slate-800">
                                            {{ $no++ }}
                                        </p>
                                    </td>
                                    <td class="p-4 py-5">
                                        <p class="block text-sm text-slate-800">
                                            {{ $involtage->name }}
                                        </p>
                                    </td>
                                    <td class="p-4 py-5">
                                        <p class="block text-sm text-slate-800">
                                            {{ $involtage->location }}
                                        </p>
                                    </td>
                                    <td class="p-4 py-5">
                                        <p class="block text-sm text-slate-800">
                                            {{ $involtage->voltage }}
                                        </p>
                                    </td>
                                    <td class="p-4 py-5">
                                        <p class="block text-sm text-slate-800">
                                            {{ $involtage->information }}
                                        </p>
                                    </td>
                                    <td class="p-4 py-5">
                                        <div class="flex space-x-2">
                                            <x-involtage.button-link type="edit"
                                                href="{{ route('involtage.edit', $involtage->id) }}" iconOnly="true" />
                                            <form action="{{ route('involtage.destroy', $involtage->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-500 hover:bg-red-600 text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition ease-in-out duration-150"
                                                    title="Delete" onclick="toggleDeleteModal(true)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m5 0H6" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="hover:bg-slate-50 border-b border-slate-200">
                                    <td colspan="6" class="p-4 py-5">
                                        <p class="block font-semibold text-sm text-center text-slate-800">
                                            No records found
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="flex justify-between items-center px-4 py-3">
                        <!-- Bagian info jumlah data -->
                        <div class="text-sm text-slate-500">
                            Showing
                            <b>{{ ($involtages->currentPage() - 1) * $involtages->perPage() + 1 }}-{{ min($involtages->currentPage() * $involtages->perPage(), $involtages->total()) }}</b>
                            of
                            {{ $involtages->total() }}
                        </div>

                        <!-- Bagian tombol pagination -->
                        <div class="flex space-x-1">
                            <!-- Tombol Previous -->
                            @if ($involtages->onFirstPage())
                                <button
                                    class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-400 bg-gray-100 border border-slate-200 rounded cursor-not-allowed">
                                    Prev
                                </button>
                            @else
                                <a href="{{ $involtages->previousPageUrl() }}"
                                    class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                                    Prev
                                </a>
                            @endif

                            <!-- Tombol Halaman -->
                            @foreach ($involtages->links()->elements[0] as $page => $url)
                                @if ($page == $involtages->currentPage())
                                    <button
                                        class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-white bg-slate-800 border border-slate-800 rounded hover:bg-slate-600 hover:border-slate-600 transition duration-200 ease">
                                        {{ $page }}
                                    </button>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            <!-- Tombol Next -->
                            @if ($involtages->hasMorePages())
                                <a href="{{ $involtages->nextPageUrl() }}"
                                    class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                                    Next
                                </a>
                            @else
                                <button
                                    class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-400 bg-gray-100 border border-slate-200 rounded cursor-not-allowed">
                                    Next
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Alert -->
    @if (session('success'))
        <div id="alertModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-80">
                <!-- Modal Header -->
                <div class="flex justify-between items-center px-4 py-2 bg-green-600 text-white rounded-t-lg">
                    <h3 class="text-lg font-semibold">Success</h3>
                    <button class="text-white hover:text-gray-200" onclick="toggleAlertModal(false)">
                        &times;
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="p-4 text-center">
                    <p class="text-gray-700">{{ session('success') }}</p>
                </div>
                <!-- Modal Footer -->
                <div class="flex justify-center p-2 bg-gray-100 rounded-b-lg">
                    <button class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700"
                        onclick="toggleAlertModal(false)">
                        OK
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Script to Auto-Close Modal -->
    <script>
        function toggleAlertModal(show) {
            const alertModal = document.getElementById('alertModal');
            if (!show) {
                alertModal.remove();
            }
        }

        // Automatically close after 3 seconds
        setTimeout(() => toggleAlertModal(false), 3000);
    </script>

    <!-- Modal Confirmation Delete -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-80">
            <!-- Header Modal -->
            <div class="flex justify-between items-center px-4 py-2 bg-red-600 text-white rounded-t-lg">
                <h3 class="text-lg font-semibold">Confirm Delete</h3>
                <button class="text-white hover:text-gray-200" onclick="toggleDeleteModal(false)">
                    &times;
                </button>
            </div>
            <!-- Body Modal -->
            <div class="p-4 text-center">
                <p class="text-gray-700">Are you sure you want to delete this data?</p>
            </div>
            <!-- Footer Modal -->
            <div class="flex justify-center gap-4 p-4 bg-gray-100 rounded-b-lg">
                <button class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600"
                    onclick="toggleDeleteModal(false)">
                    Cancel
                </button>
                <button class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700"
                    onclick="document.getElementById('deleteForm').submit()">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Script untuk Tampilkan Modal -->
    <script>
        function toggleDeleteModal(show) {
            const deleteModal = document.getElementById('deleteModal');
            if (show) {
                deleteModal.classList.remove('hidden');
                deleteModal.classList.add('flex');
            } else {
                deleteModal.classList.add('hidden');
                deleteModal.classList.remove('flex');
            }
        }
    </script>

</x-app-layout>
