{{-- Componente tabla de clientes --}}
<div class="overflow-x-auto">
    {{-- Mensaje de registro satisfactorio --}}
    @if (session()->has('message'))
        <script>
            toastr.success("{{ session('message') }}")
        </script>
    @endif

    {{-- Formulario de registro --}}
    <div class="py-10 {{ $atr_formulario }}">
        <div
            class="align-middle min-w-full overflow-hidden shadow rounded-lg md:border-l-4 border-l-4 border-r-4 border-green-700">
            <div class="sm:rounded-lg md:rounded-lg">
                <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2 pt-6 pl-8">
                    Formulario de Registro
                </label>
                <div class="bg-gray-100 rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

                    <div class="-mx-3 md:flex mb-1">

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                                for="grid-first-name">
                                Nombre / Razon Social
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                id="nombre_rs" type="text" wire:model="nombre_rs">
                            @error('nombre_rs') <span
                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-1/6 px-3 -mr-6 mb-4 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                                for="grid-last-name">
                                Documento
                            </label>
                            <select
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                id="grid-state" name="prefijo" wire:model="prefijo">
                                <option value=""></option>
                                <option value="J-">J-</option>
                                <option value="G-">G-</option>
                                <option value="V-">V-</option>
                                <option value="E-">E-</option>
                            </select>
                            @error('prefijo') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:w-2/5 px-3 mb-4 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                                for="grid-last-name">
                                Cedula / RIF
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                id="grid-last-name" type="text" name="cedula_rif" placeholder=""
                                wire:model="cedula_rif">
                            @error('cedula_rif') <span
                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:w-1/2 px-3 mb-4 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                                for="grid-first-name">
                                Email
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                id="grid-first-name" type="text" name="email" placeholder="@" wire:model="email">
                            @error('email') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-1 mt-4">
                        <div class="md:w-5/6 px-3 mb-4 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                                for="grid-first-name">
                                Direccion
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                id="grid-first-name" type="text" name="direccion" wire:model="direccion">
                            @error('direccion') <span
                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:w-2/5 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                                for="grid-last-name">
                                Telefono
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                id="grid-last-name" type="text" name="telefono1" placeholder="Ej: 0412-1234567"
                                wire:model="telefono1">
                            @error('telefono1') <span
                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @if ($atr_editar == 'activo')
                    <div class="md:flex mt-4">
                        <button wire:click="update"
                            class="inline-block px-6 py-2 font-medium leading-7 text-center text-green-700 uppercase transition bg-transparent border-2 border-green-700 rounded-full shadow hover:shadow-lg hover:bg-green-100 focus:outline-none">
                            Actualizar
                        </button>
                    </div>
                    @else
                    <div class="md:flex mt-4">
                        <button wire:click="store"
                            class="inline-block px-6 py-2 font-medium leading-7 text-center text-green-700 uppercase transition bg-transparent border-2 border-green-700 rounded-full shadow hover:shadow-lg hover:bg-green-100 focus:outline-none">
                            Registrar
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- Fin del formulario de registro --}}

    <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard rounded-lg">

        {{-- Boton para agregar clientes --}}
        <div class="flex rounded-full bg-white px-4 py-3 items-center justify-between border-gray-200 sm:px-6">
            <input wire:model="buscar" type="search" name="q"
                class="border-b border-gray-200 py-2 text-sm rounded-full sm:w-1/3 md:w-1/4 " placeholder="Buscar..."
                autocomplete="off">
            <button wire:click="verFormulario"
                class=" flex w-6 transform text-green-300 hover:text-green-500 hover:scale-110 {{ $atr_boton }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </button>
        </div>
        {{-- fin del boton agregar clientes --}}

        {{-- Tabla de clientes --}}
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
                                    <img class="w-6 h-6 rounded-full"
                                        src="{{ asset('image/userRegister.png') }}" />
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
                            <span
                                class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">{{ $item->telefono1 }}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            @if ($item->estatus == '1')
                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Activo</span>
                            @else
                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Inactivo</span>
                            @endif
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <div class="w-4 mr-2 transform text-yellow-300 hover:text-yellow-500 hover:scale-110">
                                    <button wire:click="edit({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                </div>
                                @if ($item->estatus == '1')
                                <div class="w-4 mr-2 transform text-red-300 hover:text-red-500 hover:scale-110">
                                    <button wire:click="delete({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                                @else
                                <div class="w-4 mr-2 transform text-green-300 hover:text-green-500 hover:scale-110">
                                    <button wire:click="activarCliente({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </button>
                                </div>
                                @endif

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Fin tabla de clientes --}}

        {{-- Div para la paginacion --}}
        <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
            {{-- Paginacion --}}
            {{ $clientes->links() }}
        </div>
        {{-- Fin Div paginacion --}}
    </div>
</div>
{{-- Fin del componente tabla --}}
