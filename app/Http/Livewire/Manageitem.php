<?php

namespace App\Http\Livewire;
use App\Models\Items;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Manageitem extends Component
{
 
    public $delete_id=null;

    public function render()
    {
        $items =Items::where('vendor_id',Auth()->user()->id)->paginate(2);
        return view('livewire.manageitem',compact('items'));
    }
    public function deleteT($id){
        $role = Items::find($id);
        if($role){
          $role->delete();
        }
        session()->flash('message','item deleted successfully');
        $this->redirect('/manageitem');

    }

    public function delete($id){
        
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete_model');
    }

    public function edit($id){

      
        $this->redirect('edititem/'.$id);
       

    }
}
