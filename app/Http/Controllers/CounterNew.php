<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\Contracts\MqttClient;
use App\Models\Counter;



class CounterNew extends Controller
{
    public $counters, $config_id, $topic, $sub_message;

    public $message = 75;
  
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
          $mqtt->publish('mptt_test/temp', '666', 2, true);
          //$mqtt->publish('somethingelse/other/topics', 'bar44', 1, true); // Retain the message
          $mqtt->loop(true, true);
      }
  
      public function mqttSubTest()
      {
          $mqtt = MQTT::connection();
          $mqtt->subscribe('mptt_test/temp', function (string $topic, string $message) {
              Log::error($message); 
              Counter::updateOrCreate(['id' => $this->config_id],[
                  'message' => $this->message]);      
              },1);     
          $mqtt->loop(true);
      }
  
      public function mqttSubTestOpen()
      {
          $mqtt = MQTT::connection();
          $mqtt->subscribe('mptt_test/temp', function (string $topic, string $message) {
             // Log::error($message);
              echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
          }, 1);
          $mqtt->loop(true);
      }
  
      public function stopMqttConnect()
      {
          $mqtt = MQTT::connection();
              $mqtt->interrupt();
          
      }
  
      public function store()
      {
          Counter::updateOrCreate(['id' => $this->config_id],[
                'message' => $this->message]);
      
      }
  
      public function render()
      {
          $this->counters = Counter::all();
          return view('livewire.counter');
      }
}
