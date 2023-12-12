<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form class="space-y-4 md:space-y-6" wire:submit="update">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5">
                        <label for="dokter"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dokter</label>
                            @can('Dokter')
                            <input type="text" name="dokter" id="dokter" wire:model="form.dokterId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>

                            @endcan
                            @can('Admin')

                            <select id="dokter" name="dokterId" wire:model="form.dokterId"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                @foreach ($dokters as $dokter)
                                    <option value="{{ $dokter->id }}"> {{ $dokter->name }} </option>
                                @endforeach
                            </select>
                            @endcan
                    </div>
                    <div class="relative z-0 w-full mb-5">
                        <label for="pasien"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pasien</label>
                        <select id="pasien" name="pasienId" wire:model.live="data.pasienId"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            @foreach ($pasiens as $pasien)
                                <option value="{{ $pasien->id }}"> {{ $pasien->name }} </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div>
                    <label for="tindakan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tindakan</label>
                    <textarea type="tindakan" name="tindakan" id="tindakan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Drugs Description" required="" wire:model="form.tindakan">{{ $form->tindakan }}</textarea>
                </div>
            </div>
            <div class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="grid md:grid-cols-3 md:gap-6">
                    <div class="relative z-0 w-full mb-5">
                        <label for="medicine"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medicine</label>
                        <select id="medicine" name="medicineId" wire:model="form.medicineId.0"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option disabled> choose medicine </option>
                            @foreach ($medicines as $medicine)
                                <option value="{{ $medicine->id }}"> {{ $medicine->nama }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative z-0 w-full mb-5">
                        <label for="kuantitas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kuantitas</label>
                        <input type="number" name="kuantitas" id="kuantitas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="1-9" required="" wire:model="form.kuantitas.0">

                    </div>
                    <div class="relative z-0 mb-5 align-middle jusitfy-end">

                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            wire:click.prevent="add({{ $i }})"><i class="fa fa-plus"></i></button>

                    </div>
                </div>
                @if($updateMode)
                @endif
                @foreach ($inputs as $key => $value)
                    <div class="grid md:grid-cols-3 md:gap-6">
                        <div class="relative z-0 w-full mb-5">
                            <label for="medicine"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medicine</label>
                            <select id="medicine" name="medicineId" wire:model="form.medicineId.{{ $value }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled> choose medicine </option>

                                @foreach ($medicines as $medicine)
                                    <option value="{{ $medicine->id }}"> {{ $medicine->nama }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-5">
                            <label for="kuantitas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kuantitas</label>
                            <input type="number" name="kuantitas" id="kuantitas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="1-9" required="" wire:model="form.kuantitas.{{ $value }}">

                        </div>
                        <div class="relative z-0 mb-5 align-middle jusitfy-end">

                            <button
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                wire:click.prevent="remove({{ $key }})"><i class="fa fa-minus"></i></button>

                        </div>
                    </div>
                @endforeach
            </div>


        </div>
        <div class="flex justify-end item-center">

            <a type="button" href="{{ route('records.index') }}"
                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Red</a>
            <button type="submit" on:click="alert()"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Green</button>
        </div>
    </form>

</div>
