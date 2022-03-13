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
                {{-- <x-jet-welcome /> --}}
                {{-- @livewire('user') --}}
                @if (Str::contains(Auth::user()->role, 'Student'))
                    Dashboard for Students
                    Welcome to eduValley!!!
                @elseif (Str::contains(Auth::user()->role, 'Admin'))
                    <livewire:users />
                @elseif (Str::contains(Auth::user()->role, 'Teacher'))
                    <livewire:charts />
                @endif
            </div>
        </div>
    </div>

    <livewire:meet-valley />

</x-app-layout>
