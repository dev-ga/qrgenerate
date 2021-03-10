<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inversiones P&G 2015 C.A.') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mt-6 mx-auto sm:px-6 lg:px-8">
          @livewire('prueba')
        </div>
    </div>
</x-app-layout>