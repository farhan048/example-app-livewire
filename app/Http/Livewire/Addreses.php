<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address;
class Addreses extends Component
{

    public $province, $selectedItem, $province_id;

    public function resetInputs()
    {
        $this->province = '';
    }


    public function render()
    {
        $alamat = Address::all();
        return view('livewire.addreses',compact('alamat'));
    }

    protected $rules = [
        'province' => 'required|min:6',
        
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        Address::create([
            'province' => $this->province
        ]);
        session()->flash('message', 'Data Berhasil Ditambahkan');
        $this->resetInputs();
        $this->dispatchBrowserEvent('close');
        $this->emit('store');
    }

    public function selectedItem(Address $Address )
    {
        $this->dispatchBrowserEvent('openupdate');
        $data = Address::where('id', $selectedItem);
       $this->province_id = $data->id;
       $this->province = $data->province;
       
       
      
    }
}
