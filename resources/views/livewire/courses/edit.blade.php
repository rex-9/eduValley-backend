<div class="fixed inset-0 z-10 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput1"
                            class="block mr-2 text-sm font-bold text-gray-700">Teacher ID:</label>
                        <input type="text"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Enter Teacher ID" wire:model="teacher_id">
                        @error('teacher_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput1"
                            class="block mr-2 text-sm font-bold text-gray-700">Name:</label>
                        <input type="text"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput2"
                            class="block mr-2 text-sm font-bold text-gray-700">Grade:</label>
                        <input type="grade"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2" wire:model="grade" placeholder="Enter Grade"></input>
                        @error('grade') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput2"
                            class="block mr-2 text-sm font-bold text-gray-700">Subject:</label>
                        <input type="subject"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2" wire:model="subject" placeholder="Enter Subject"></input>
                        @error('subject') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput2"
                            class="block mr-2 text-sm font-bold text-gray-700">Image:</label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2" wire:model="image" placeholder="Enter Image"></input>
                        @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput2"
                            class="block mr-2 text-sm font-bold text-gray-700">Token:</label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2" wire:model="token" placeholder="Enter Token"></input>
                        @error('token') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput2"
                            class="block mr-2 text-sm font-bold text-gray-700">Zip:</label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2" wire:model="zip" placeholder="Enter Zip"></input>
                        @error('zip') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput2"
                            class="block mr-2 text-sm font-bold text-gray-700">Price:</label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2" wire:model="price" placeholder="Enter Price"></input>
                        @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput2"
                            class="block mr-2 text-sm font-bold text-gray-700">Students:</label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2" wire:model="students" placeholder="Enter Students"></input>
                        @error('students') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput2"
                            class="block mr-2 text-sm font-bold text-gray-700">Genre:</label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2" wire:model="genre" placeholder="Enter Genre"></input>
                        @error('genre') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="exampleFormControlInput2"
                            class="block mr-2 text-sm font-bold text-gray-700">Ongoing:</label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2" wire:model="ongoing" placeholder="Enter Ongoing"></input>
                        @error('ongoing') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex mb-2">
                        <input id="exampleFormControlInput2" type="checkbox" wire:model="ongoing"
                            name="ongoing">
                        <label for="exampleFormControlInput2"
                            class="block mb-2 ml-2 text-sm font-bold text-gray-700">Ongoing</label>
                        @error('ongoing') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto" >
                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5">
                            Store
                        </button>
                    </span>
                    <span class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalPopover()" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-bold leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
