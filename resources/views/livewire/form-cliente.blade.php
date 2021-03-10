  <div class="py-10 {{ $atr_form }}"> 
    <div class="align-middle min-w-full overflow-hidden shadow rounded-lg md:border-l-4 border-l-4 border-r-4 border-green-700">
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
                            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="nombre_rs" type="text" wire:model="nombre_rs">
                        @error('nombre_rs') <span class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-1/6 px-3 -mr-6 mb-4 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-last-name">
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
                        @error('prefijo') <span class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:w-2/5 px-3 mb-4 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-last-name">
                            Cedula / RIF
                        </label>
                        <input
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                            id="grid-last-name" type="text" name="cedula_rif" placeholder="" wire:model="cedula_rif">
                        @error('cedula_rif') <span class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:w-1/2 px-3 mb-4 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                            for="grid-first-name">
                            Email
                        </label>
                        <input
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                            id="grid-first-name" type="text" name="email" placeholder="@" wire:model="email">
                        @error('email') <span class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
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
                        @error('direccion') <span class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="md:w-2/5 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-last-name">
                            Telefono
                        </label>
                        <input
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                            id="grid-last-name" type="text" name="telefono1" placeholder="+58" wire:model="telefono1">
                        @error('telefono1') <span class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                        </div>
                </div>
                <div class="md:flex mt-4">
                    <button wire:click="store"
                        class="inline-block px-6 py-2 font-medium leading-7 text-center text-green-700 uppercase transition bg-transparent border-2 border-green-700 rounded-full shadow hover:shadow-lg hover:bg-green-100 focus:outline-none">
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



  