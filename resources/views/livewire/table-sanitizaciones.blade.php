<div class="overflow-x-auto">
    {{-- Mensaje de registro satisfactorio --}}
    @if (session()->has('message'))
        <script>
            toastr.success("{{ session('message') }}")
        </script>
    @endif

    {{-- Formulario de registro de sanitizaciones --}}
    <div class="py-10 {{ $atr_formulario }}">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                <div class="bg-gray-100 shadow-2xl rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                    <div class="-mx-3 md:flex mb-1">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                                for="grid-first-name">
                                Cliente
                            </label>
                            <div class="relative">
                                <select
                                    class="bg-gray-100 block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                    id="grid-state" name="nombrecliente" wire:model="nombrecliente">
                                    <option value=""></option>
                                    @foreach($clientes as $item)
                                    <option value="{{ $item->nombre_rs }}">{{ $item->nombre_rs }}</option>
                                    @endforeach
                                </select>
                                @error('servicio') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                                for="grid-first-name">
                                Servicio
                            </label>
                            <div class="relative">
                                <select
                                    class="bg-gray-100 block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                    id="grid-state" name="servicio" wire:model="servicio">
                                    <option value=""></option>
                                    <option value="covisol">Covisol</option>
                                    <option value="ozono">Ozono</option>
                                    <option value="ozono+covisol">Ozono + Covisol</option>
                                </select>
                                @error('servicio') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-last-name">
                                Area a Sanitizar
                            </label>
                            <div class="relative">
                                <select
                                    class="bg-gray-100 block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                    id="grid-state" name="area" wire:model="area">
                                    <option value=""></option>
                                    <option value="residencial">Residencial</option>
                                    <option value="casa propia">Casa Propia</option>
                                    <option value="comercio">Comercios</option>
                                    <option value="hospital">Hospital</option>
                                    <option value="clinica">Clinica</option>
                                    <option value="centro comercial">Centro Comercial</option>
                                    <option value="mini centro">Mini Centro</option>
                                    <option value="local comercial">Local Comercial</option>
                                    <option value="hospital">Hospital</option>
                                    <option value="automovil particular">Automovil Particular</option>
                                    <option value="autobus">AutoBus</option>
                                    <option value="microbus">MicroBus</option>
                                    <option value="camiones encabas">Camiones Encabas</option>
                                    <option value="containers">Containers</option>
                                </select>
                                @error('area') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-1 mt-5">
                        <div class="md:w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-password">
                                Fecha de Inicio
                            </label>
                            <input
                                class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                                id="grid-password" type="date" name="fechainicio" wire:model="fechainicio">
                            @error('fechainicio') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-password">
                                Fecha de Vencimiento
                            </label>
                            <input
                                class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                                id="grid-password" type="date" name="fechafin" wire:model="fechafin">
                            @error('fechafin') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="md:flex mb-1 mt-6">
                        <button wire:click="store"
                            class="inline-block px-6 py-2 font-medium leading-7 text-center text-green-700 uppercase transition bg-transparent border-2 border-green-700 rounded-full shadow hover:shadow-lg hover:bg-green-100 focus:outline-none">
                            Registrar
                        </button>
                    </div>
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
                class=" flex w-6 transform text-green-300 hover:text-green-500 hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </button>
        </div>
        {{-- fin del boton --}}

        {{-- Tabla de clientes --}}
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">QR</th>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Descripcion</th>
                    <th class="py-3 px-6 text-center">Servicio</th>
                    <th class="py-3 px-6 text-center">Area</th>
                    <th class="py-3 px-6 text-center">Vencimiento</th>
                    <th class="py-3 px-6 text-center">...</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($data as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{QrCode::size(60)->generate("http://127.0.0.1:8000/sanitizaciones/".$item->cliente_id)}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full"
                                        src="https://listimg.pinclipart.com/picdir/s/13-131563_pest-control-pest-control-icon-png-clipart.png" />
                                </div>
                                <span>{{ $item->id }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left ">
                            <div class="flex items-center">
                                <span>{{ $item->nombrecliente }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span>{{ $item->servicio }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span
                                class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">{{ $item->area }}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Activo</span>
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
                                <div class="w-4 mr-2 transform text-red-300 hover:text-red-500 hover:scale-110">
                                    <a href="{{ route('sanitizaciones', $item->cliente_id) }}" type="button">
                                    {{-- <button wire:click="delete({{ $item->id }})"> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    {{-- </button> --}}
                                    </a>
                                </div>
                            </div>
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
                                <div class="w-4 mr-2 transform text-red-300 hover:text-red-500 hover:scale-110">
                                    <button wire:click="delete({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
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
