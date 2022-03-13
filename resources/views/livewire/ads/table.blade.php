<x-slot name="header">
    <h2 class="text-center">Ad Table</h2>
</x-slot>
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
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
            <button wire:click="create()"
                class="inline-flex justify-center w-full px-4 py-2 my-4 text-base font-bold text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-400">
                Create Ad
            </button>
            @if($isModalOpen)
            @include('livewire.ads.edit')
            @endif
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="w-20 px-4 py-2">No.</th>
                        <th class="px-4 py-2">Serial</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Site</th>
                        <th class="px-4 py-2">Expire</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ads as $ad)
                    <tr>
                        <td class="px-4 py-2 border">{{ $ad->id }}</td>
                        <td class="px-4 py-2 border">{{ $ad->serial }}</td>
                        <td class="px-4 py-2 border">{{ $ad->name }}</td>
                        <td class="px-4 py-2 border">{{ $ad->site }}</td>
                        <td class="px-4 py-2 border">{{ $ad->expire }}</td>
                        <td class="px-4 py-2 border">{{ $ad->category }}</td>
                        <td class="px-4 py-2 text-center border">
                            <button wire:click="edit({{ $ad->id }})"
                                class="btn lm">Edit</button>
                            <button wire:click="delete({{ $ad->id }})"
                                class="bg-red-100 btn hover:scale-110 hover:bg-red-600 hover:text-white">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
