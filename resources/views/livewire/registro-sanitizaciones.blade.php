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
