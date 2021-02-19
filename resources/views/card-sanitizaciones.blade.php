<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inversiones P&G 2015 C.A.') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('card-sanitizaciones',['datas' => $datas])
                {{--  @livewire('editar-cliente', ['prueba' => $prueba])  --}}
        </div>
    </div>
</x-app-layout>