<?php

namespace App\Http\Livewire;

//use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\GrowConfig;

class GrowConfigs extends Component
{
    public $grow_configs, $config_id, $name, $day_temp, $night_temp, $day_humd, $night_humd, $lg_str_hour, $lg_str_min, $lg_str_medan, $lg_dur_hours, $lg_dur_mins, $hourplus_mod;
    public $isConfigModelOpen = 0;

    
    public function render()
    {
        $this->grow_configs = GrowConfig::all();
        return view('livewire.grow-configs');
    }
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUserId(Request $request)
    {       
        $user_id = $request->user()->id; // Retrieve the currently authenticated user's ID... 
    }
    */

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isConfigModelOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isConfigModelOpen = false;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->day_temp = '';
        $this->night_temp = '';
        $this->day_humd = '';
        $this->night_humd = '';
        $this->lg_str_hour = '';
        $this->lg_str_min = '';
        $this->lg_str_medan = '';
        $this->lg_dur_hours = '';
        $this->lg_dur_mins = '';
        $this->hourplus_mod = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'day_temp' => 'required',
            'night_temp' => 'required',
            'day_humd' => 'required',
            'night_humd' => 'required',
            'lg_str_hour' => 'required',
            'lg_str_min' => 'required',
            'lg_str_medan' => 'required',
            'lg_dur_hours' => 'required',
            'lg_dur_mins' => 'required',
            'hourplus_mod' => 'required',
        ]);
   
        GrowConfig::updateOrCreate(['id' => $this->config_id], [
            'name' => $this->name,
            'day_temp' => $this->day_temp,
            'night_temp' => $this->night_temp,
            'day_humd' => $this->day_humd,
            'night_humd' => $this->night_humd,
            'lg_str_hour' => $this->lg_str_hour,
            'lg_str_min' => $this->lg_str_min,
            'lg_str_medan' => $this->lg_str_medan,
            'lg_dur_hours' => $this->lg_dur_hours,
            'lg_dur_mins' => $this->lg_dur_mins,
            'hourplus_mod' => $this->hourplus_mod,
        ]);
  
        session()->flash('message', 
            $this->config_id ? 'Grow Configureation Updated.' : 'New Grow Configuration Created!');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $growconfig = GrowConfig::findOrFail($id);
        $this->config_id = $id;
        $this->name = $growconfig->name;
        $this->day_temp = $growconfig->day_temp;
        $this->night_temp = $growconfig->night_temp;
        $this->day_humd = $growconfig->day_humd;
        $this->night_humd = $growconfig->night_humd;
        $this->lg_str_hour = $growconfig->lg_str_hour;
        $this->lg_str_min = $growconfig->lg_str_min;
        $this->lg_str_medan = $growconfig->lg_str_medan;
        $this->lg_dur_hours = $growconfig->lg_dur_hours;
        $this->lg_dur_mins = $growconfig->lg_dur_mins;
        $this->hourplus_mod = $growconfig->hourplus_mod;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        GrowConfig::find($id)->delete();
        session()->flash('message', 'Configureation Removed.');
    }
}
