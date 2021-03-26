@if (session()->has('message'))
    <script>
        toastr.success("{{ session('message') }}")

    </script>
@endif

        {{-- Linea 1 del formulario --}}

          <div class="p-4 flex md:flex space-x-4 rounded-md ">
            <div class="flex-1">
                <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                            for="grid-first-name">
                            Cliente
                        </label>
                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="nombre_rs" type="text" name="nombre_rs">
                @error('nombre_rs') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 w-1/4">
                <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-first-name">
                            Tipo de Documento
                        </label>
                        <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="prefijo" type="text" name="prefijo" wire:model="prefijo">
                        <option value=""></option>
                        <option value="J-">J-</option>
                        <option value="G-">G-</option>
                        <option value="V-">V-</option>
                        <option value="E-">E-</option>
                        </select>
                @error('prefijo') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1">
                <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                            for="grid-first-name">
                            Cedula/Rif
                        </label>
                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="cedula_rif" name="cedula_rif" type="text" wire:model="cedula_rif">
                @error('cedula_rif') <span class="error">{{ $message }}</span> @enderror
            </div>
          </div>

        {{-- Linea 1 del formulario --}}

          <div class="p-4 flex  space-x-4 rounded-md">
            <div class="flex-1">
                <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-first-name">
                            Email
                        </label>
                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="@" id="email" type="email" name="email" wire:model="email">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1">
                <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-first-name">
                            Direccion
                        </label>
                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="direccion" name="direccion" type="text" wire:model="direccion">
                @error('direccion') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1">
                <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-first-name">
                            Telefono
                        </label>
                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="telefono1" name="telefono1" type="text" wire:model="telefono1">
            </div>
          </div>

    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

    <div class="flex justify-end mr-3 mb-10">
        
        <button wire:click="store()"
                        class="inline-block px-6 py-2 font-medium leading-7 text-center text-green-700 uppercase transition bg-transparent border-2 border-green-700 rounded-full shadow hover:shadow-lg hover:bg-green-100 focus:outline-none">
                        Registrar
                    </button>
      </div>
    <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard rounded-lg">
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
                                        <img class="w-6 h-6 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyFlwEU-WJN4mTEFuh6C3_XcQX3EeEZSJgUg&usqp=CAU"/>
                                    </div>
                                    <span>{{ $item->nombre_rs }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform text-red-300 hover:text-red-500 hover:scale-110">
                                        {{-- <svg wire:click='delete' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg> --}}
                                        <button wire:click="delete()"
                        class="inline-block px-6 py-2 font-medium leading-7 text-center text-green-700 uppercase transition bg-transparent border-2 border-green-700 rounded-full shadow hover:shadow-lg hover:bg-green-100 focus:outline-none">
                        Registrar
                    </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
</div>
</div>



