<?php

namespace App\Http\Livewire;
use App\Models\role;

use Livewire\Component;

class Addrole extends Component
{

    public $role_name;

    public function store(){
        
        $validatedData = $this->validate([
         'role_name'=>'required',
      ]);


     role::create($validatedData);
     session()->flash('message','Role inserted successfully');
     $this->Reset();
     $this->redirect('/managerole');

    }
    public function render()
    {
        return view('livewire.addrole');
    }
}
