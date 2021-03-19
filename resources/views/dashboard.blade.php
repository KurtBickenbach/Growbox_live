<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard!') }}
        </h2>
    </x-slot>
    <div class="pt-10"></div>
    <div style="display:flex">
        <div id="item1" style="float: center;" >
        <div class="p-6 mx-auto" style="width: 300px;">         
            <h5 class="title text-center">Connected Devices</h5>                       
            <button wire:click="mqttPublishTest()" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
                </span>
                    Add Device
            </button>                                                            
        </div> 
        <div class="p-6">
            <div class="bg-white max-8 overflow-hidden shadow-sm sm:rounded-lg px-4 py-4">
                
                    <h6 class="text-center">ESP-32 34857</h6>
                    <i class="fa fa-leaf fa-lg block my-8 h-2 w-auto"></i>

            </div>
        </div>                                                    
        </div id="item2" style="float: left;"> 
            
                <div class="bg-white max-8 overflow-hidden shadow-sm sm:rounded-lg px-4 py-4">
                    some stuff here and a lot more stuff!!
                </div>              
    </div>  
    
</x-app-layout>
