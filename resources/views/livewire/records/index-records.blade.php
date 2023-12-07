<div>
  {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          RecordId
        </th>
        <th scope="col" class="px-6 py-3">
          Status
        </th>
        @cannot('Pasien')
        <th scope="col" class="px-6 py-3">
            Action
        </th>
        @endcannot
      </tr>
    </thead>
    <tbody>
      @if (count($collection) > 0)
        @foreach ($collection as $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ $item->RecordId }}
            </th>
            <td class="px-6 py-4">
              {{ $item->status }}
            </td>
            @cannot("Pasien")
            <td class="px-6 py-4">
                @canany(['Admin',"Apoteker"])
                    <button wire:click="changeStatus({{ $item->recordId }})" class></button>
                @endcanany
                @canany(['Admin',"Dokter"])
                <button type="button" wire:click='delete({{$item->id}})' class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i class="fa fa-trash" ></i></button>
                @endcanany
            </td>
            @endcannot

          </tr>
        @endforeach
      @else
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td class="px-6 py-4"> no data </td>
        </tr>

      @endif

    </tbody>
  </table>
</div>
