<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form class="space-y-4 md:space-y-6" wire:submit="store">
        @csrf

        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-5">
            <label for="dokter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dokter</label>
            <select id="dokter" name="dokterId" wire:model.live="data.dokterId"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

              @foreach ($dokters as $dokter)
                <option value="{{ $dokter->id }}"> {{ $dokter->name }} </option>
              @endforeach
            </select>
          </div>
          <div class="relative z-0 w-full mb-5">
            <label for="pasien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pasien</label>
            <select id="pasien" name="pasienId" wire:model.live="data.pasienId"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

              @foreach ($pasiens as $pasien)
                <option value="{{ $pasien->id }}"> {{ $pasien->name }} </option>
              @endforeach
            </select>
          </div>

        </div>
        <div class="flex justify-end item-center">

            <a type="button" href="{{ route('records.index') }}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Red</a>
            <button type="submit" on:click="alert()" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Green</button>
        </div>
    </form>

</div>
