<?php

namespace App\Http\Livewire;
use App\Models\role;
use Livewire\Component;

class Managerole extends Component
{
    public function render()
    {
        $role = role::get();
        return view('livewire.managerole', compact("role"));
    }
    public function delete($id){

        $role = role::find($id);
        if($role){
          $role->delete();
        }
        
        $this->redirect('/managerole');
    }
}
