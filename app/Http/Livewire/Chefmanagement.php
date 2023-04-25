<?php

namespace App\Http\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chefmanagement extends Component
{

    public $delete_chef_id;
    public function render()
    {
        $user = Auth::user();
     
        $chefs = User::where('company_id',$user->id)->Where('role','7')->get();
      
        return view('livewire.chefmanagement',compact("chefs"));
    }

    public function delete($id){
        $this->delete_chef_id = $id;
        $check = User::where('id', $this->delete_chef_id)->first();
        $this->dispatchBrowserEvent('delete_chef_model');
        
    }

    public function deleteT($id){

      $check = User::where('id', $id)->delete();
      
            session()->flash('message', 'Chef Deleted successfully');
            $this->redirect('/chef-management');
    
    }

    public function edit($id){
        
        $this->redirect('edit-chef-info/'.$id);
    }
}
