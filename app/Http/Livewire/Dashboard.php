<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\Facades\MQTT;

class Dashboard extends Component
{
    public function render()
    {
        $this->dashboard = Dashboard::all();
        return view('livewire.dashboard');
    }

    public function getUserId(Request $request)
    {
        $user = Auth::user(); // Retrieve the currently authenticated user...
        $id = Auth::id(); // Retrieve the currently authenticated user's ID...

        
        $user = $request->user(); // returns an instance of the authenticated user...
        $client_id = $request->user()->id; // Retrieve the currently authenticated user's ID...

        
        $user = auth()->user(); // Retrieve the currently authenticated user...
        $client_id = auth()->id();  // Retrieve the currently authenticated user's ID...
    }

    public function mqttPublishTest()
    {   
        /** @var \PhpMqtt\Client\Contracts\MqttClient $mqtt */
        $mqtt = MQTT::connection();
        $mqtt->publish('mptt_test/humd', '67', 2, true);
        //$mqtt->publish('somethingelse/other/topics', 'bar44', 1, true); // Retain the message
        $mqtt->loop(true, true);
    }
}
