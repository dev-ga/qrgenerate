<div class="dark:bg-black p-10 flex items-center justify-center">
    <div class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-800 p-4 rounded-xl border max-w-xl">
      <div class="flex justify-between">
        <div class="flex items-center">

            @foreach ($datas as $item)
            {{QrCode::size(60)->generate("http://127.0.0.1:8000/sanitizaciones/".$item->id)}}

            
          <div class="ml-1.5 text-sm leading-tight">

            <span class="text-2xl leading-normal mt-0 ml-4 text-green-800 font-bold block ">{{ $item->nombrecliente }}</span>
            {{-- <span class="text-gray-500 dark:text-gray-400 font-normal block">Tipo de Sanitizacion: {{ $item->servicio }}</span> --}}
          </div>
        </div>
        {{--  <svg class="text-blue-400 dark:text-white h-6 w-auto inline-block fill-current" viewBox="0 0 24 24"><g><path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path></g></svg>  --}}
      </div>
      <p class=" text-green-800 font-bold dark:text-white block text-xl leading-snug mt-6">Tipo de Sanitizacion: {{ $item->servicio }}</p>
      @if ($item->servicio == 'covisol')
      <img class="mt-2 rounded-2xl border border-gray-100 dark:border-gray-700 mb-6" src="{{ asset('image/covisolRender.png') }}"/>
      @endif
      @if ($item->servicio == 'ozono')
      <img class="mt-2 rounded-2xl border border-gray-100 dark:border-gray-700 mb-6" src="{{ asset('image/hero_sanity.jpg') }}"/>
      @endif
      @if ($item->servicio == 'ozono+covisol')
      <img class="mt-2 rounded-2xl border border-gray-100 dark:border-gray-700 mb-6" src="{{ asset('image/ozoneCovisol.jpg') }}"/>
      @endif

      {{-- <img class="mt-2 rounded-2xl border border-gray-100 dark:border-gray-700 mb-6" src="{{ asset('image/ozoneCovisol.jpg') }}"/> --}}
      {{-- <p class="text-gray-500 dark:text-gray-400 text-base py-1 my-0.5">{{ $item->fechainicio }}</p> --}}
      @endforeach
      <div class="border-gray-200 dark:border-gray-600 border border-b-0 my-1"></div>
      <div class="text-gray-500 dark:text-gray-400 flex mt-6 items-center justify-center">
        
        
            <div class="dark:bg-black p-10 items-center justify-center shadow block content-center">
                <span class="text-2xl ml-3 block text-center text-green-800 font-bold">Ultima Sanitizacion</span>
                <img class="mt-2 rounded-2xl mb-6" src="https://cdn5.vectorstock.com/i/thumb-large/71/04/q-letter-green-logo-with-check-mark-inside-vector-30257104.jpg"/>

                <span class="text-2xl ml-3 block text-center text-green-800 font-bold">{{ $item->fechainicio }}</span>
            </div>
            <div class="dark:bg-black p-10 items-center justify-center shadow block">
              <span class="text-2xl ml-3 block text-center text-yellow-500 font-bold">Proxima Sanitizacion</span>
              <img class="mt-2 rounded-2xl mb-6" src="https://icons.iconarchive.com/icons/3dlb/3d-vol2/256/warning-icon.png"/>
              <span class="text-2xl ml-3 block text-center text-yellow-500 font-bold">{{ $item->fechafin }}</span>
            </div>
            {{-- <img class="w-17 h-17" viewbox="0 0 48 48" src="{{ asset('image/logoPG_login.png') }}" /> --}}
        
      </div>
    </div>
  </div>