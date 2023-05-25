<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

use App\Models\Items;
use Livewire\Component;

class Additem extends Component
{

    use WithFileUploads;

    public $title;
    public $vendor_id;
    public $type;
    public $slug;
    public $price;
    public $quentity;
    public $cooking;
    public $content;
    public $instructions;
    public $status;
    public $discount;
    public $image;


    public function resetAll(){
         $this->title ='';
         $this->vendor_id='';
         $this->type='';
         $this->slug='';
         $this->price='';
         $this->quentity='';
         $this->cooking='';
         $this->content='';
         $this->instructions='';
         $this->status='';
         $this->discount='';
         $this->image='';
        
       
    }
    public function store()
    {

        $user = Auth::user();
        $this->vendor_id = $user->id;
        $this->slug = $this->title;
        $validatedData = $this->validate([
            'title' => 'required',
            'vendor_id' => 'required',
            'image' => 'image',
            'type' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'quentity' => 'required',
            'cooking' => 'required',
            'content' => 'required',
            'instructions' => 'required',
            'status' => 'required',
            'discount' => 'required'
        ]);
       
        $image= $this->image->store('imagetesting', 'public');

        // $image = $this->image->store('files','public');
        $validatedData['image'] = $image;

      
        Items::create($validatedData);
        session()->flash('message','item Saved successfully');
        $this->resetAll();
        $this->emit('fileUploaded');

    }
    public function render()
    {

        $category = Category::where('status',1)->get();
        return view('livewire.additem',compact('category'));
    }
}
