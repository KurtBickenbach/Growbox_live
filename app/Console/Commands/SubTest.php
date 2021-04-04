<?php

namespace App\Console\Commands;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Http\Controllers\MqttsubTest;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\Contracts\MqttClient;
use App\Models\Counter;

class SubTest extends Command
 
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:subtest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test for start Subscribe loop';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        //$request = Request::create('/post', 'GET');
        //$this->info(app()['Illuminate\Contracts\Http\Kernel']->handle($request));
        {
            $mqtt = MQTT::connection();
            $mqtt->subscribe('dev/unit0001/slog/#', function (string $topic, string $message) {
                //echo sprintf('Received QoS level 1 message on topic [%s]: %s "\n"' , $topic, $message);
                $dbtopic = substr($topic, 18);
                static $tmp;
                Static $hum;
                static $lg;
                static $fhumU;
                static $humU;
                static $fheatU;
                static $heatU;
                static $exfan;
                echo "--i--";
                switch($dbtopic){
                    case 'tmp':
                        $tmp = $message;
                        
                        //echo $tmp;
                        break;
                    case 'hum':
                        $hum = $message;
                        //echo $hum;
                        break;
                    case 'lg':
                        $lg = $message;
                        //echo $lg;
                        break;
                    case 'fhumU':
                        $fhumU = $message;
                        break;
                    case 'humU':
                        $humU = $message;
                        break;
                    case 'fheatU':
                        $fheatU = $message;
                        break; 
                    case 'heatU':
                        $heatU = $message;
                        break;
                    case 'exfan':
                        $exfan = $message;
                        //echo $exfan;
                        break;                         
                }
                if(strcmp($dbtopic, 'exfan') == 0){
                    Counter::create([                            
                            'tmp' => $tmp, 
                            'hum' => $hum,
                            'lg' => $lg,
                            'fhumU' => $fhumU,
                            'humU' => $humU,
                            'fheatU' => $fheatU,
                            'heatU' => $heatU,
                            'exfan' => $exfan,
                            ]);
                }
                echo $dbtopic;
                
                //Counter::create(['topic' => $dbtopic, 'message' => $message,]);              
            }, 1);
            $mqtt->loop(true);
        }
    }

    public function logToDB(){


    }

        /**
     * Register the closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
    require base_path('PhpMqtt\Client\Examples\05_interuppting_the_loop\01_use_pcntl_signal_to_interrupt_the_loop.php;');
    }
}
