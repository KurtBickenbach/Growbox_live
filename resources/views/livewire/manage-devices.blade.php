<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        BoxieGrow Device Managment
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
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Add New Device</button>
            @if($isDevieModelOpen)
                @include('livewire.create-device')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Unit ID</th>
                        <th class="px-4 py-2">Version</th>
                        <th class="px-4 py-2">User ID</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manage_devices as $devices)
                    <tr>
                        <td class="border px-4 py-2">{{ $devices->id }}</td>
                        <td class="border px-4 py-2"><i class="fa fa-leaf fa-lg block pr-2"></i>{{ $devices->name }}</td>
                        <td class="border px-4 py-2">{{ $devices->unit_id }}</td>
                        <td class="border px-4 py-2">{{ $devices->device_version }}</td>
                        <td class="border px-4 py-2">{{ $devices->user_id }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $devices->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $devices->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>