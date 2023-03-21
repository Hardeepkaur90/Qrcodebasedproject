<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use App\Models\Category;
use Livewire\Component;

class Editcategory extends Component
{
    use WithFileUploads;
    public $name;
    public $image;
    public $status;


    public $edit_cat_id;

    public function mount($id)
    {
        $existingItem = Category::find($id);
        $this->edit_cat_id = intval($existingItem->id);

        $this->name = $existingItem->name;
        $this->image = $existingItem->image;
        $this->status = $existingItem->status;
      
    }

    public function edit(){
    $this->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
           
        ]);

        if($this->image){
            $image = $this->image->store('category','public');
            $data['image'] =  $image;
        }

      
        

        $data['name'] = $this->name;
        $data['status'] = $this->status;
       
     

        Category::where('id',$this->edit_cat_id)->update($data);
        session()->flash('message', 'category updated  successfully');
       
       
    }
}
