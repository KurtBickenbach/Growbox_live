<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\Contracts\MqttClient;

class Pubtest extends Component
{
    
    public function mqttSubTestOpen()
    {
        /** @var \PhpMqtt\Client\Contracts\MqttClient $mqtt */
        $mqtt = MQTT::connection();
        pcntl_signal(SIGINT, function () use ($mqtt) {
            $mqtt->interrupt();
        });

        $mqtt = MQTT::connection();
        $mqtt->subscribe('mptt_test/temp', function (string $topic, string $message) {
            session()->flash('message', 'Received QoS level 1 message on topic [%s]: %s', $topic, $message);
        }, 1);
        $mqtt->interrupt();
        $mqtt->loop(true);

        $mqtt->disconnect();
    }
}
