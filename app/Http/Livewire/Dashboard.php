<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Counter;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }

    public function store()
    {
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
}
