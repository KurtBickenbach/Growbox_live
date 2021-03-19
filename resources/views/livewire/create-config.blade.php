<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-top bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="FormInputConfigName" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="string" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputDeviceName" placeholder="Enter Config Name" wire:model.lazy="name">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex justify-evenly bg-yellow-100">
                            <div class="mb-4">
                                <label for="FormInputConfigDtemp" class="block text-gray-700 text-sm font-bold my-2">Day Temperature:</label>
                                <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputConfigDtemp" name="FormInputConfigDtemp" placeholder="75" min="0" max="90" wire:model.lazy="day_temp">
                                @error('day_temp') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-4">
                                <label for="FormInputConfigDhumd" class="block text-gray-700 text-sm font-bold my-2">Day Humidity:</label>
                                <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputConfigDhumd" placeholder="68" min="0" max="80" wire:model.lazy="day_humd">
                                @error('day_humd') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="flex justify-evenly bg-blue-100">
                            <div class="mb-4">
                                <label for="FormInputConfigNtemp" class="block text-gray-700 text-sm font-bold my-2">Night Temperature:</label>
                                <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputConfigNtemp" placeholder="60" min="0" max="90" wire:model.lazy="night_temp">                               
                                @error('night_temp') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-4">
                                <label for="FormInputConfigNhumd" class="block text-gray-700 text-sm font-bold my-2">Night Humidity:</label>
                                <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputConfigNhumd" placeholder="40" min="0" max="80" wire:model.lazy="night_humd">
                                @error('night_humd') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="flex justify-evenly my-4 bg-purple-100">
                            <div class="mb-4">
                                <label for="FormInputLgStart" class="block text-gray-700 text-sm font-bold my-2">Lighting Start Time:</label>                               
                                    <div> Hour: </div>
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputLgStrH" placeholder="8" min="0" max="12" wire:model.lazy="lg_str_hour">
                                    @error('lg_str_hours') <span class="text-red-500">{{ $message }}</span>@enderror
                                    <div> Minutes: </div>
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputLgStrMin" placeholder="00" min="0" max="59" wire:model.lazy="lg_str_min">
                                    @error('lg_str_min') <span class="text-red-500">{{ $message }}</span>@enderror
                                    <div> Medan: </div>
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputLgStm" placeholder="0" min="0" max="1" wire:model.lazy="lg_str_medan">
                                    @error('lg_str_medan') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="mb-4">
                                    <label for="FormInputLgDur" class="block text-gray-700 text-sm font-bold my-2">Light Duration:</label>                                
                                    <div> Hour: </div>
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputLgDur" placeholder="18" min="12" max="18" wire:model.lazy="lg_dur_hours">
                                    @error('lg_dur_hours') <span class="text-red-500">{{ $message }}</span>@enderror
                                    <div> Minutes: </div>
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputLgDur" placeholder="00" min="0" max="59" wire:model.lazy="lg_dur_mins">
                                    @error('lg_dur_mins') <span class="text-red-500">{{ $message }}</span>@enderror
                                    <div> Light Cycle Mode: </div>
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FormInputHourPlus" placeholder="0" min="0" max="1" wire:model.lazy="hourplus_mod">
                                    @error('hourplus_mod') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>    
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 disabled:opacity-50">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>