<div>

    <div class="p-4 mb-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        Dashboard
    </div>
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">


<div class="relative overflow-x-auto">
    @can("Admin")
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Dokter
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($collection) > 0)
            @foreach ($collection as $item)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->name}}
                </th>
                <td class="px-6 py-4">
                    {{$item->email}}
                </td>

            </tr>
            @endforeach
            @else{
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4"> no data </td>
                </tr>
            }
            @endif

        </tbody>
    </table>
    @endcan
    @can('Apoteker')
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    RecordId
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($collection) > 0)
            @foreach ($collection as $item)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->RecordId}}
                </th>
                <td class="px-6 py-4">
                    {{$item->status}}
                </td>
                <td class="px-6 py-4">
                    <button wire:click="changeStatus({{$item->recordId}})" class>

                    </button>
                </td>

            </tr>
            @endforeach
            @else{
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4"> no data </td>
                </tr>
            }
            @endif

        </tbody>
    </table>
    @endcan
</div>

    </div>
</div>
