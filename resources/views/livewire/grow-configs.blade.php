<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        GrowBox Enviroment Configurations
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-green-100 rounded-b text-green-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Configuration</button>
            @if($isConfigModelOpen)
                @include('livewire.create-config')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Temp Day<i class="fa fa-temperature-high fa-lg block pr-2"></i></th>
                        <th class="px-4 py-2">Temp Night</th>
                        <th class="px-4 py-2">Humidity Day</th>
                        <th class="px-4 py-2">Humidity Night</th>
                        <th class="px-4 py-2">LG start H</th>
                        <th class="px-4 py-2">LG start M</th>
                        <th class="px-4 py-2">LG start Med</th>
                        <th class="px-4 py-2">LG Duration H</th>
                        <th class="px-4 py-2">LG Duration M</th>
                        <th class="px-4 py-2">HourPlus Mode</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grow_configs as $configs)
                    <tr>
                        <td class="border px-4 py-2">{{ $configs->id }}</td>
                        <td class="border px-4 py-2">{{ $configs->name }}</td>
                        <td class="border px-4 py-2">{{ $configs->day_temp }}</td>
                        <td class="border px-4 py-2">{{ $configs->night_temp }}</td>
                        <td class="border px-4 py-2">{{ $configs->day_humd }}</td>
                        <td class="border px-4 py-2">{{ $configs->night_humd }}</td>
                        <td class="border px-4 py-2">{{ $configs->lg_str_hour }}</td>
                        <td class="border px-4 py-2">{{ $configs->lg_str_min }}</td>
                        <td class="border px-4 py-2">{{ $configs->lg_str_medan }}</td>
                        <td class="border px-4 py-2">{{ $configs->lg_dur_hours }}</td>
                        <td class="border px-4 py-2">{{ $configs->lg_dur_mins }}</td>
                        <td class="border px-4 py-2">{{ $configs->hourplus_mod }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $configs->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $configs->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>