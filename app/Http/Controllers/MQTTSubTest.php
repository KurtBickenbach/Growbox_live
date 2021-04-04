<?php

namespace App\Http\Controllers;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\Contracts\MqttClient;

class mqttsubtest extends Component
{

    public function subtest()
    {
        /** @var \PhpMqtt\Client\Contracts\MqttClient $mqtt */
        $mqtt = MQTT::connection();
        $mqtt->subscribe('some/topic', function (string $topic, string $message) {
            echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
        }, 1);
        $mqtt->loop(true);
    }

}