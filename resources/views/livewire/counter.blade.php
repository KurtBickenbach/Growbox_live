<div class="flex justify-start">
    <div>
    <button wire:click="mqttPublishTest()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Publish Test QoS2</button>
    </div>
    <div>
        <button wire:click="simplePublish()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simple_Pub_Test</button>
    </div>
      <div>
      <div>
          <button wire:click="mqttSubTest()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Subsribe Test </button>
      </div>
      <div>
        <button wire:click="mqttSubTestOpen()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Subsribe Open </button>
      </div>
    </div>
    <div>
      <div>
        <button wire:click.prevent="store()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">DB test</button>
      </div>
      <div>
        <button wire:click.prevent="stopMqttConnect()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">mqtt disconect</button>
      </div>
    </div>
    
    @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
              </div>
    @endif            
</div>
