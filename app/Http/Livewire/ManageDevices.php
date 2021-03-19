<?php

namespace App\Http\Livewire;

//use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\ManageDevice;

class ManageDevices extends Component
{
    public $manage_devices, $name, $unit_id, $device_version, $device_id;
    public $isDevieModelOpen = 0;

    
    public function render()
    {
        $this->manage_devices = ManageDevice::all();
        return view('livewire.manage-devices');
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
        $this->isDevieModelOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isDevieModelOpen = false;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->unit_id = '';
        $this->device_version = '';
        $this->device_id = '';
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
            'unit_id' => 'required',
            'device_version' => 'required',
        ]);
   
        ManageDevice::updateOrCreate(['id' => $this->device_id], [
            'name' => $this->name,
            'unit_id' => $this->unit_id,
            'device_version' => $this->device_version,
        ]);
  
        session()->flash('message', 
            $this->device_id ? 'Device Updated Successfully.' : 'Device Connected Successfully.');
  
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
        $managedevice = ManageDevice::findOrFail($id);
        $this->device_id = $id;
        $this->name = $managedevice->name;
        $this->unit_id = $managedevice->unit_id;
        $this->device_version = $managedevice->device_version;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        ManageDevice::find($id)->delete();
        session()->flash('message', 'Device Removed Successfully.');
    }
}
