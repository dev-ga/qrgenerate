@if (session()->has('message'))
    <script>
        toastr.success("{{ session('message') }}")

    </script>
@endif
{{-- <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="100" height="100" viewBox="0 0 100 100"><rect x="0" y="0" width="100" height="100" fill="#ffffff"/><g transform="scale(4)"><g transform="translate(0,0)"><path fill-rule="evenodd" d="M8 0L8 1L10 1L10 0ZM15 0L15 1L13 1L13 2L11 2L11 4L10 4L10 3L9 3L9 2L8 2L8 5L9 5L9 6L8 6L8 7L9 7L9 8L8 8L8 10L6 10L6 9L7 9L7 8L6 8L6 9L4 9L4 8L0 8L0 10L1 10L1 12L0 12L0 13L1 13L1 15L0 15L0 16L1 16L1 15L2 15L2 14L5 14L5 15L3 15L3 16L4 16L4 17L5 17L5 15L7 15L7 16L6 16L6 17L7 17L7 16L10 16L10 17L12 17L12 18L11 18L11 19L12 19L12 20L10 20L10 21L8 21L8 25L9 25L9 22L10 22L10 21L12 21L12 22L11 22L11 23L14 23L14 20L13 20L13 18L14 18L14 17L15 17L15 16L16 16L16 19L15 19L15 20L16 20L16 21L15 21L15 22L16 22L16 21L17 21L17 25L18 25L18 24L19 24L19 25L20 25L20 24L19 24L19 21L20 21L20 23L21 23L21 25L25 25L25 24L23 24L23 23L24 23L24 22L25 22L25 21L24 21L24 20L25 20L25 18L23 18L23 16L24 16L24 17L25 17L25 15L24 15L24 14L25 14L25 12L24 12L24 11L23 11L23 8L20 8L20 9L19 9L19 10L18 10L18 12L17 12L17 11L16 11L16 12L14 12L14 11L11 11L11 13L10 13L10 12L8 12L8 11L9 11L9 10L10 10L10 9L9 9L9 8L10 8L10 7L11 7L11 8L12 8L12 7L13 7L13 5L14 5L14 7L15 7L15 5L17 5L17 2L15 2L15 1L17 1L17 0ZM12 3L12 5L10 5L10 6L9 6L9 7L10 7L10 6L11 6L11 7L12 7L12 5L13 5L13 3ZM16 6L16 7L17 7L17 6ZM14 8L14 9L15 9L15 10L17 10L17 9L18 9L18 8L17 8L17 9L15 9L15 8ZM24 8L24 9L25 9L25 8ZM1 9L1 10L2 10L2 12L1 12L1 13L2 13L2 12L3 12L3 13L5 13L5 14L8 14L8 15L9 15L9 14L10 14L10 15L11 15L11 16L12 16L12 17L13 17L13 16L14 16L14 15L13 15L13 16L12 16L12 14L14 14L14 13L13 13L13 12L12 12L12 14L10 14L10 13L9 13L9 14L8 14L8 12L7 12L7 11L6 11L6 10L4 10L4 9L3 9L3 10L2 10L2 9ZM20 9L20 10L21 10L21 9ZM3 10L3 11L4 11L4 12L5 12L5 11L4 11L4 10ZM6 12L6 13L7 13L7 12ZM16 12L16 14L15 14L15 15L16 15L16 16L18 16L18 15L19 15L19 16L21 16L21 18L22 18L22 20L21 20L21 22L22 22L22 23L23 23L23 22L22 22L22 21L23 21L23 18L22 18L22 16L23 16L23 15L22 15L22 16L21 16L21 14L20 14L20 15L19 15L19 14L18 14L18 13L17 13L17 12ZM19 12L19 13L20 13L20 12ZM23 12L23 13L22 13L22 14L23 14L23 13L24 13L24 12ZM17 14L17 15L18 15L18 14ZM8 17L8 18L9 18L9 17ZM17 17L17 20L20 20L20 17ZM18 18L18 19L19 19L19 18ZM10 24L10 25L11 25L11 24ZM12 24L12 25L13 25L13 24ZM14 24L14 25L16 25L16 24ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM18 0L18 7L25 7L25 0ZM19 1L19 6L24 6L24 1ZM20 2L20 5L23 5L23 2ZM0 18L0 25L7 25L7 18ZM1 19L1 24L6 24L6 19ZM2 20L2 23L5 23L5 20Z" fill="#000000"/></g></g></svg> </div> --}}
<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
    <div class="flex justify-start">
        <a href="{{ route('registro.sanitizaciones') }}" class="bg-green-500 text-white active:bg-green-600 font-bold text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease">+ Sanitizacion</a>
      </div>
    <div
        class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">QR
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID
                    </th>
                    {{-- <th 
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Cliente Nro.</th> --}}
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Descripcion</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Servicio</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Area</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Fecha Inicio</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Vencimiento</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Creado</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($data as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">{{QrCode::size(80)->generate("http://127.0.0.1:8000/table/sanitizaciones/".$item->id."/".$item->nombrecliente)}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">{{ $item->id }}</div>
                                </div>
                            </div>
                        </td>
                        {{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{ $item->cliente_id }}</div>
                        </td> --}}
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{ $item->nombrecliente }}</td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{ $item->servicio }}</td>
                        <td
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{ $item->area }}</td>
                        <td
                        <td
                        class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                        {{ $item->fechainicio }}</td>
                    <td
                    class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                    {{ $item->fechafin }}</td>
                {{-- <td
                            class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative text-xs">Activo</span>
                            </span>
                        </td> --}}
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">
                            {{ $item->created_at }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                            <button
                                class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">View
                                Details</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

