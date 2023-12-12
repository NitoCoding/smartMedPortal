<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="p-4 mb-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        Dashboard
    </div>
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">


        <div class="relative overflow-x-auto">
            <div class="flex justify-end text-white">
                <a type="button" href="{{ route('records.add') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                    Data</a>
            </div>
            <div>
                <input type="search" wire:model.live="search" placeholder="Search Record"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            RecordId
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Berobat
                        </th>
                        @cannot('Pasien')
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        @endcannot
                    </tr>
                </thead>
                <tbody>
                    @if (count($collection) > 0 and $collection != null)
                        {{-- @php
        foreach ($collection as $key => $value) {
            echo $value;
        }
        @endphp --}}
                        @foreach ($collection as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->id }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->status }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ date('d-m-Y h:i:s', $item->tglBerobat) }}
                                </td>
                                @cannot('Pasien')
                                    <td class="px-6 py-4 w-[15%]">

                                        @canany(['Admin', 'Dokter'])
                                            @if (Auth::user()->id == $item->dokterId)
                                                <a type="button" href="{{ route('records.edit', $item->id) }}"
                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                                                        class="fa fa-pen"></i></a>
                                                <button type="button" wire:click='delete({{ $item->id }})'
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i
                                                        class="fa fa-trash"></i></button>
                                                @if ($item->status == 'active')
                                                    <button wire:click="changeStatus({{ $item->id }})"
                                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                        Set to Pending
                                                    </button>
                                                @endif
                                            @endif
                                            @if (Auth::user()->role == 'Admin')
                                                <a type="button" href="{{ route('records.edit', $item->id) }}"
                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                                                        class="fa fa-pen"></i></a>
                                                <button type="button" wire:click='delete({{ $item->id }})'
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i
                                                        class="fa fa-trash"></i></button>
                                                @if ($item->status == 'active')
                                                    <button wire:click="changeStatus({{ $item->id }})"
                                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                        Set to Pending
                                                    </button>
                                                @endif
                                            @endif
                                        @endcanany
                                        @canany(['Admin', 'Apoteker'])
                                            @if ($item->status == 'pending')
                                                <button wire:click="changeStatus({{ $item->id }})"
                                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                    Set to Completed
                                                </button>
                                            @endif
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
            <div>
                {{ $collections->links() }}
            </div>
        </div>
    </div>
</div>
