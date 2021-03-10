@if (session()->has('message'))
    <script>
        toastr.success("{{ session('message') }}")

    </script>
@endif
{{-- @include('livewire.form-cliente') --}}

  {{-- tabla de clientes --}}
<div class="overflow-x-auto">

    @include('livewire.form-cliente')

<div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard rounded-lg">

    <div class="flex rounded-full bg-white px-4 py-3 items-center justify-between border-gray-200 sm:px-6">
        <input wire:model="buscar" type="search" name="q" class="border-b border-gray-200 py-2 text-sm rounded-full sm:w-1/3 md:w-1/4 " placeholder="Buscar..." autocomplete="off">
        
        <button wire:click="view_form" class=" flex w-6 transform text-red-300 hover:text-red-500 hover:scale-110" >
            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
         </button>
    </div>
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Cliente</th>
                <th class="py-3 px-6 text-left">Cedula/Rif</th>
                <th class="py-3 px-6 text-center">Email</th>
                <th class="py-3 px-6 text-center">Telefono</th>
                <th class="py-3 px-6 text-center">Status</th>
                <th class="py-3 px-6 text-center">...</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($clientes as $item)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{ $item->id }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <img class="w-6 h-6 rounded-full" src="https://livingatlas.arcgis.com/topoexplorer/images/profile-pictures.png"/>
                        </div>
                        <span>{{ $item->nombre_rs }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left ">
                    <div class="flex items-center">
                        <span>{{ $item->cedula_rif }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex items-center justify-center">
                        <span>{{ $item->email }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    <span class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">{{ $item->telefono1 }}</span>
                </td>
                <td class="py-3 px-6 text-center">
                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Activo</span>
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex item-center justify-center">
                        <div class="w-4 mr-2 transform text-yellow-300 hover:text-yellow-500 hover:scale-110">
                            <button wire:click="edit({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                             </button>
                        </div>
                        <div class="w-4 mr-2 transform text-red-300 hover:text-red-500 hover:scale-110">
                            <button wire:click="delete({{ $item->id }})">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                             </button>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
        {{ $clientes->links() }}
    </div>  
</div>
</div>