<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use App\Models\Category;
use Livewire\Component;

class Addcategory extends Component
{
    use WithFileUploads;
public $name;
public $image;
public $status;

public function resetAll(){
    $this->name ='';
    $this->image ='';
    $this->status ='';
  }

    public function render()
    {
        return view('livewire.addcategory');
    }

    public function store(){
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
           
        ]);

        $image = $this->image->store('category','public');
        $validatedData['image'] = $image;


        Category::create($validatedData);
        session()->flash('message','category Saved successfully');
        $this->resetAll();
       
    }
}
