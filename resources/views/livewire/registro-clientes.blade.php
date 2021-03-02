@if (session()->has('message'))
    <script>
        toastr.success("{{ session('message') }}")

    </script>
@endif

<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="sm:rounded-lg">
            <div class="bg-gray-100 shadow-2xl rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-1">
                    <div class="md:w-2/5 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                            for="grid-first-name">
                            Nombre / Razon Social
                        </label>
                        <input
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="grid-first-name" type="text" name="nombre_rs" wire:model="nombre_rs">
                        @error('nombre_rs') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-last-name">
                            Tipo de Documento
                        </label>
                        <select
                                class="bg-gray-100 block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state" name="prefijo" wire:model="prefijo">
                                <option value=""></option>
                                <option value="J-">J-</option>
                                <option value="G-">G-</option>
                                <option value="V-">V-</option>
                                <option value="E-">E-</option>
                            </select>
                        @error('prefijo') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:w-2/5 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-last-name">
                            Cedula / RIF
                        </label>
                        <input
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="grid-last-name" type="text" name="cedula_rif" placeholder="" wire:model="cedula_rif">
                        @error('cedula_rif') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-1">
                    <div class="md:w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-password">
                            Direccion Principal
                        </label>
                        <input
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            id="grid-password" type="text" name="direccion" wire:model="direccion">
                        @error('direccion') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-1">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2"
                            for="grid-first-name">
                            Correo Electronico
                        </label>
                        <input
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="grid-first-name" type="text" name="email" placeholder="@" wire:model="email">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-last-name">
                            Nro. de contacto Principal
                        </label>
                        <input
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="grid-last-name" type="text" name="telefono1" placeholder="+58" wire:model="telefono1">
                        @error('telefono1') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    
                    {{-- <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs mb-2" for="grid-last-name">
                            Nro. de contacto (otro)
                        </label>
                        <input
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="grid-last-name" type="text" name="telefono2" placeholder="+58" wire:model="telefono2">
                        </div> --}}
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
