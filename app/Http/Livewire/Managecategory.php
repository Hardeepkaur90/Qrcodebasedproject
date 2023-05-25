<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Managecategory extends Component
{
    public function render()
    {

        $category = Category::paginate(10);
        
        return view('livewire.managecategory', compact("category"));
    }

    public function delete($id){

      
        $category = Category::find($id);
        if($category){
            $category->delete();
        }
        session()->flash('message','category deleted successfully');
        $this->redirect('/manage-category');
    }

    public function edit($id){


    $this->redirect('edit-category/'.$id);

    }
}
