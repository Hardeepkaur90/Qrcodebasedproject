<?php

namespace App\Http\Livewire;

use App\Models\Items;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edititem extends Component
{
    use WithFileUploads;
    public $category;
    public $title, $vendor_id, $type, $slug, $price, $quentity, $cooking, $content, $instructions, $status, $discount, $image,$image1;
    public $urlID = '';


    public function mount($id)
    {
        $existingItem = Items::find($id);
        $this->urlID = intval($existingItem->id);
        $this->title = $existingItem->title;
        $this->vendor_id = $existingItem->vendor_id;
        $this->type = $existingItem->type;
        $this->slug = $existingItem->slug;
        $this->price = $existingItem->price;
        $this->quentity = $existingItem->quentity;
        $this->cooking = $existingItem->cooking;
        $this->content = $existingItem->content;
        $this->instructions = $existingItem->instructions;
        $this->status = $existingItem->status;
        $this->discount = $existingItem->discount;
        $this->image = $existingItem->image;
        $this->image1 = $existingItem->image;

        $this->category = Category::get();
  
    }

    public function edit()
    {
        // $this->validate([
        //     'title' => 'required',
        //     'type' => 'required',
        //     'price' => 'required',
        //     'quentity' => 'required',
        //     'cooking' => 'required',
        //     'content' => 'required',
        //     'instructions' => 'required',
        //     'status' => 'required',
        //     'discount' => 'required'
        // ]);

   

        $data['title'] = $this->title;
        $data['type'] = $this->type;
        $data['price'] = $this->price;
        $data['quentity'] = $this->quentity;
        $data['cooking'] = $this->cooking;
        $data['content'] = $this->content;
        $data['instructions'] = $this->instructions;
        $data['discount'] = $this->discount;
        $data['status'] = $this->status;
        


        if($this->image != $this->image1) {
            $this->image = $this->image->store('files', 'public');
            $data['image'] = $this->image;
        }else{
            $data['image'] = $this->image1;
        }
    

        Items::where('id',$this->urlID)->update($data);
        session()->flash('message', 'item updated  successfully');
        // $this->resetAll();
        // $this->redirect('/manageitem');
       


    }



}
