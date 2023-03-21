<?php

namespace App\Http\Livewire;
use App\Models\Table;
use Livewire\WithPagination;
use Livewire\Component;

class Managetable extends Component
{

    public $delete_id=null;

    public function render()
    {

        $allTables = Table::where('rest_id',Auth()->user()->id)->paginate(2);
        return view('livewire.managetable',compact("allTables"));
    }

    public function deleteT($id){

        $table = Table::find($id);
        if($table){
          $table->delete();
        }
        session()->flash('message','Table deleted successfully');
        $this->redirect('/manage-table');
    }

    public function delete($id){
      
        $this->delete_id =$id;
        $this->dispatchBrowserEvent('show-delete-model');
    }

    public function edit($id){
     $this->redirect('edit-table/'.$id);
    }
}
