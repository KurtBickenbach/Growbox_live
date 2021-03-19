<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\Contracts\MqttClient;
use App\Models\Counter;

class Counters extends Component
{   

  public $counters, $config_id, $topic, $message;

    public function getUserId(Request $request)
    {
        $user = Auth::user(); // Retrieve the currently authenticated user...
        $id = Auth::id(); // Retrieve the currently authenticated user's ID...

        
        $user = $request->user(); // returns an instance of the authenticated user...
        $client_id = $request->user()->id; // Retrieve the currently authenticated user's ID...

        
        $user = auth()->user(); // Retrieve the currently authenticated user...
        $client_id = auth()->id();  // Retrieve the currently authenticated user's ID...
    }

    public function simplePublish()
    {
        MQTT::publish('some/topic', 'Hello World!', true, 'default'); 
    }

    public function mqttPublishTest()
    {   
        /** @var \PhpMqtt\Client\Contracts\MqttClient $mqtt */
        $mqtt = MQTT::connection();
        $mqtt->publish('mptt_test/humd', '666', 2, true);
        //$mqtt->publish('somethingelse/other/topics', 'bar44', 1, true); // Retain the message
        $mqtt->loop(true, true);
    }

    public function mqttSubTest()
    {
        /** @var \PhpMqtt\Client\Contracts\MqttClient $mqtt */
        $mqtt = MQTT::connection();
        pcntl_signal(SIGINT, function () use ($mqtt) {
            $mqtt->interrupt();
        });

        $mqtt = MQTT::connection();
        $mqtt->subscribe('mptt_test/temp', function (string $topic, string $message) {
            echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
            $message = 'message';
        }, 1);

        Counter::updateOrCreate(['id' => $this->config_id],[
            'message' => $this->message,
        ]);    

        $mqtt->interrupt();
        $mqtt->loop(true);

        $mqtt->disconnect();
    }

    public function mqttSubTestOpen()
    {


        $mqtt = MQTT::connection();
        $mqtt->subscribe('mptt_test/temp', function (string $topic, string $message) {
            echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
        }, 1);
        //$mqtt->interrupt();
        $mqtt->loop(true, true);

        //$mqtt->disconnect();
    }

    public function stopMqttConnect()
    {
        pcntl_signal(SIGINT, function () use ($mqtt) {
            $mqtt->interrupt();
        });
    }

    public function render()
    {
        $this->counters = Counter::all();
        return view('livewire.counter');
    }
}
