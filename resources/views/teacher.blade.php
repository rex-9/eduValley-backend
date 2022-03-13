<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 font-qs">
                {{ __('edu') }}
            </h2>
            <h2 class="text-xl font-semibold leading-tight text-primary font-qs">
                {{ __('Valley') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <livewire:teachers />
            </div>
        </div>
    </div>
</x-app-layout>
