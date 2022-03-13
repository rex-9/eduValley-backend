<x-slot name="header">
    <h2 class="text-center">Course Table</h2>
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
                Create Course
            </button>
            @if ($isModalOpen)
                @include('livewire.courses.edit')
            @endif
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="w-20 px-4 py-2">No.</th>
                            <th class="px-4 py-2">Teacher ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Grade</th>
                            <th class="px-4 py-2">Subject</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Token</th>
                            <th class="px-4 py-2">Zip</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Students</th>
                            <th class="px-4 py-2">Genre</th>
                            <th class="px-4 py-2">Ongoing</th>
                            <th class="px-4 py-2">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td class="px-4 py-2 border">{{ $course->id }}</td>
                                <td class="px-4 py-2 border">{{ $course->teacher_id }}</td>
                                <td class="px-4 py-2 border">{{ $course->name }}</td>
                                <td class="px-4 py-2 border">{{ $course->grade }}</td>
                                <td class="px-4 py-2 border">{{ $course->subject }}</td>
                                <td class="px-4 py-2 border">{{ $course->image }}</td>
                                <td class="px-4 py-2 border">{{ $course->token }}</td>
                                <td class="px-4 py-2 border">{{ $course->zip }}</td>
                                <td class="px-4 py-2 border">{{ $course->price }}</td>
                                <td class="px-4 py-2 border">{{ $course->students }}</td>
                                <td class="px-4 py-2 border">{{ $course->genre }}</td>
                                <td class="px-4 py-2 border">{{ $course->ongoing }}</td>
                                <td class="px-4 py-2 text-center border">
                                    <button wire:click="edit({{ $course->id }})" class="btn lm">Edit</button>
                                    <button wire:click="delete({{ $course->id }})"
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
