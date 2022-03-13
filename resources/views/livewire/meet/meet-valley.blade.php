<div>
    @if ($isModalOpen)
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
                                    class="block mr-2 text-sm font-bold text-gray-700">Room:</label>
                                <input type="text"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput1" placeholder="Enter Room" wire:model="room">
                            </div>
                            @error('room') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="meetValley" type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 text-base font-bold leading-6 text-white transition duration-150 ease-in-out border border-transparent rounded-md shadow-sm bg-primary hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5">
                                    Meet
                                </button>
                            </span>
                            <span class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <button wire:click="closeModalPopover" type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 text-base font-bold leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">
                                    Close
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif


    <button wire:click="openModalPopover"
        class="absolute bottom-0 right-0 inline-flex items-center px-4 py-2 mx-12 my-12 font-bold text-white rounded-lg bg-primary focus:bg-blue-600">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
            width="3em" height="3em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20">
            <g fill="none">
                <path
                    d="M5 5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1.029l2.841 1.847A.75.75 0 0 0 17 13.19V6.811a.75.75 0 0 0-1.16-.629L13 8.032V7a2 2 0 0 0-2-2H5zm8 4.224l3-1.952v5.457l-3-1.95V9.224zM12 7v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"
                    fill="currentColor" />
                <path
                    d="M6.892 2.03a7.067 7.067 0 0 0-.85.37a4.67 4.67 0 0 0-.292.166l-.018.012l-.006.004l-.002.001l-.001.001L6 3l-.277-.416a.5.5 0 0 0 .554.833l.007-.005l.041-.025c.038-.023.099-.058.18-.1c.162-.085.407-.2.728-.317A8.105 8.105 0 0 1 10 2.5c1.183 0 2.125.236 2.767.47c.32.117.566.232.728.317a3.69 3.69 0 0 1 .22.125l.008.004l.262-.393l-.262.393a.5.5 0 1 0 .554-.832L14 3l.277-.416l-.001-.001l-.002-.001l-.006-.004l-.019-.012a4.665 4.665 0 0 0-.292-.166a7.063 7.063 0 0 0-.849-.37A9.104 9.104 0 0 0 10 1.5a9.104 9.104 0 0 0-3.108.53zm-.615 1.387c-.001 0 0 0 0 0zm7.446 0z"
                    fill="currentColor" />
                <path
                    d="M6.892 17.97c.733.267 1.79.53 3.108.53a9.104 9.104 0 0 0 3.108-.53c.367-.133.653-.268.85-.37a4.626 4.626 0 0 0 .291-.166l.019-.012l.006-.004l.002-.001s.001-.001-.276-.417l.277.416a.5.5 0 0 0-.554-.832l.262.393l-.262-.393l-.008.005a3.67 3.67 0 0 1-.22.125c-.162.084-.407.2-.728.316A8.106 8.106 0 0 1 10 17.5a8.106 8.106 0 0 1-2.767-.47a6.075 6.075 0 0 1-.728-.317a3.663 3.663 0 0 1-.22-.125l-.008-.005a.5.5 0 0 0-.554.833L6 17l-.277.416l.001.001l.002.001l.006.004l.018.012l.063.038a7.063 7.063 0 0 0 1.078.497zm-.615-1.386c-.001 0 0 0 0 0zm7.446 0z"
                    fill="currentColor" />
            </g>
        </svg>
        <span class="ml-4">Meet</span>
    </button>
</div>
