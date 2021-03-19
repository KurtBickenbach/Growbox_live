<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Device;

class Devices extends Component
{
    public $devices, $name, $unit_id, $device_version, $device_id;
    public $isOpen = 0;

    public function render()
    {
        $this->devices = Device::all();
        return view('livewire.devices');
    }

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
        $this->isOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
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
   
        Device::updateOrCreate(['id' => $this->device_id], [
            'name' => $this->title,
            'unit_id' => $this->unit_id,
            'device_version' => $this->device_version,
            'user_id' => $this->user_id
        ]);
  
        session()->flash('message', 
            $this->unit_id ? 'Device Updated Successfully.' : 'Device Connected Successfully.');
  
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
        $device = Device::findOrFail($id);
        $this->device_id = $id;
        $this->name = $device->name;
        $this->unit_id = $device->unit_id;
        $this->device_version = $device->device_version;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Device::find($id)->delete();
        session()->flash('message', 'Device Removed Successfully.');
    }
}
