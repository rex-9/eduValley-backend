<div class="pb-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
        @if (session()->has('message'))
            <div class="px-4 py-3 my-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif
        {{-- @if ($isModalOpen)
            @include('livewire.students.edit')
        @endif --}}
        <div class="mt-8 space-y-4 ">
            <form wire:submit.prevent="search" method="get" class="flex items-center">
                <input class="w-full p-2 border border-gray-300 border-solid md:w-1/4" type="text"
                    placeholder="Search Users" wire:model="search" />
                <button><img class="w-10 ml-2" src="{{ asset('assets/search.svg') }}"></button>
            </form>
            @if ($search == '')
                <div class="text-sm text-gray-500">
                    Enter a term to search for users.
                </div>
            @else
                @if ($searches == null)
                    <div class="text-sm text-gray-500">
                        No matching result was found.
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Name</th>
                                    <th class="w-1/4 px-4 py-2">Email</th>
                                    {{-- <th class="px-4 py-2">G10EngUnwh</th>
                                    <th class="px-4 py-2">G7EngUnwh</th> --}}
                                    <th class="px-4 py-2">Organic</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($searches as $student)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $student->name }}</td>
                                        <td class="px-4 py-2 overflow-x-auto border">{{ $student->email }}</td>
                                        {{-- <td class="px-4 py-2 border">{{ $student->g10_eng_unwh }}</td>
                                        <td class="px-4 py-2 border">{{ $student->g7_eng_unwh }}</td> --}}
                                        <td class="px-4 py-2 border">{{ $student->g11old_organic_utl }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endif
        </div>
        <div class="overflow-x-auto">
            <table class="w-full mt-10 table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Name</th>
                        <th class="w-1/4 px-4 py-2">Email</th>
                        {{-- <th class="px-4 py-2">G10EngUnwh</th> --}}
                        {{-- <th class="px-4 py-2">G7EngUnwh</th> --}}
                        <th class="px-4 py-2">Organic</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-4 py-2 border">{{ $student->name }}</td>
                            <td class="px-4 py-2 overflow-x-auto border ">{{ $student->email }}</td>
                            {{-- <td class="px-4 py-2 border">{{ $student->g10_eng_unwh }}</td> --}}
                            {{-- <td class="px-4 py-2 border">{{ $student->g7_eng_unwh }}</td> --}}
                            <td class="px-4 py-2 border">{{ $student->g11old_organic_utl }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
