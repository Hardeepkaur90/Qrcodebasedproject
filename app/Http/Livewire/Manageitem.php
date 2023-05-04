<?php

namespace App\Http\Livewire;

use App\Models\Addtocart;
use App\Models\Items;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Manageitem extends Component
{

    public $delete_id = null;

    public function render()
    {
        $items = Items::where('vendor_id', Auth()->user()->id)->paginate(6);
        return view('livewire.manageitem', compact('items'));
    }
    public function deleteT($id)
    {

        $role = Items::find($id);
        if ($role) {
            $role->delete();
        }
        session()->flash('message', 'item deleted successfully');
        $this->redirect('/manageitem');
    }

    public function delete($id)
    {

        $this->delete_id = $id;
        $check = Addtocart::where('item_id', $this->delete_id)->first();
        if (isset($check)) {
          
            session()->flash('message', 'item cant be deleted');
            $this->redirect('/manageitem');
        }else{
           
            $this->dispatchBrowserEvent('delete_model');
        }

      
    }

    public function edit($id)
    {
         $this->redirect('edititem/' . $id);
    }
}
