{{-- <x-slot name="header">
    <h2 class="text-center">Laravel 8 Livewire CRUD Demo</h2>
</x-slot> --}}
{{-- <livewire:search-user/> --}}

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
        {{-- <button wire:click="create()"
                class="inline-flex justify-center w-full px-4 py-2 my-4 text-base font-bold text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700">
                Create Student
            </button> --}}
        @if ($isModalOpen)
            @include('livewire.users.edit')
        @endif
        <div class="mt-8 space-y-4 ">
            <form wire:submit.prevent="search" method="get" class="flex items-center">
                <input class="w-full p-2 border border-gray-300 border-solid md:w-1/4" type="text"
                    placeholder="Search Users" wire:model="search" />
                <button><img class="w-10 ml-2" src="{{ asset('assets/search.svg') }}"></button>
            </form>
            {{-- <div wire:loading>Searching users...</div> --}}
            {{-- <div wire:loading.remove> --}}
            <!--
                        notice that $term is available as a public
                        variable, even though it's not part of the
                        data array
                    -->
            @if ($search == '')
                <div class="text-sm text-gray-500">
                    Enter a term to search for users.
                </div>
            @else
                {{-- {{ $searches }} --}}
                @if ($searches == null)
                    <div class="text-sm text-gray-500">
                        No matching result was found.
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="w-1/12 px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Role</th>
                                    <th class="px-4 py-2">Phone</th>
                                    {{-- <th class="px-4 py-2">G10EngUnwh</th> --}}
                                    {{-- <th class="px-4 py-2">G7EngUnwh</th> --}}
                                    {{-- <th class="px-4 py-2">Organic</th> --}}
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($searches as $user)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $user->id }}</td>
                                        <td class="px-4 py-2 border">{{ $user->name }}</td>
                                        <td class="px-4 py-2 overflow-x-auto border">{{ $user->email }}</td>
                                        <td class="px-4 py-2 border">{{ $user->role }}</td>
                                        <td class="px-4 py-2 border">{{ $user->phone }}</td>
                                        {{-- <td class="px-4 py-2 border">{{ $user->g10_eng_unwh }}</td> --}}
                                        {{-- <td class="px-4 py-2 border">{{ $user->g7_eng_unwh }}</td> --}}
                                        {{-- <td class="px-4 py-2 border">{{ $user->g11old_organic_utl }}</td> --}}
                                        <td class="px-4 py-2 border">
                                            <button wire:click="edit({{ $user->id }})"
                                                class="btn lm">Edit</button>
                                            {{-- <button wire:click="delete({{ $user->id }})"
                                            class="text-white bg-red-500 btn">Delete</button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endif
        </div>
        {{-- <div class="px-4 mt-4">
                    {{$users->links()}}
                </div> --}}
        <div class="overflow-x-auto">
            <table class="w-full mt-10 table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="w-1/12 px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name ({{ count($users) }})</th>
                        <th class="w-1/4 px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="w-1/6 px-4 py-2">Phone</th>
                        {{-- <th class="px-4 py-2">G10EngUnwh ({{ count($count_g10_eng_unwh) }}) </th> --}}
                        {{-- <th class="px-4 py-2">G7EngUnwh ({{ count($count_g7_eng_unwh) }}) </th> --}}
                        {{-- <th class="px-4 py-2">Organic ({{ count($count_g11old_organic_utl) }}) </th> --}}
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-4 py-2 border">{{ $user->id }}</td>
                            <td class="px-4 py-2 border">{{ $user->name }}</td>
                            <td class="px-4 py-2 overflow-x-auto border ">{{ $user->email }}</td>
                            <td class="px-4 py-2 border">{{ $user->role }}</td>
                            <td class="px-4 py-2 border">{{ $user->phone }}</td>
                            {{-- <td class="px-4 py-2 border">{{ $user->g10_eng_unwh }}</td> --}}
                            {{-- <td class="px-4 py-2 border">{{ $user->g7_eng_unwh }}</td> --}}
                            {{-- <td class="px-4 py-2 border">{{ $user->g11old_organic_utl }}</td> --}}
                            <td class="px-4 py-2 border">
                                <button wire:click="edit({{ $user->id }})" class="btn lm">Edit</button>
                                {{-- <button wire:click="delete({{ $user->id }})"
                                class="text-white bg-red-500 btn">Delete</button> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
