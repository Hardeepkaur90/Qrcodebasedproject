<?php

namespace App\Http\Livewire;

use App\Models\Items;
use Livewire\Component;

class Edititem extends Component
{

    public $title, $vendor_id, $type, $slug, $price, $quentity, $cooking, $content, $instructions, $status, $discount, $image;
    public $urlID = '';

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
    }

    public function edit()
    {
        $this->validate([
            'title' => 'required',
            'type' => 'required',
            'price' => 'required',
            'quentity' => 'required',
            'cooking' => 'required',
            'content' => 'required',
            'instructions' => 'required',
            'status' => 'required',
            'discount' => 'required'
        ]);

   

        $data['title'] = $this->title;
        $data['type'] = $this->type;
        $data['price'] = $this->price;
        $data['quentity'] = $this->quentity;
        $data['cooking'] = $this->cooking;
        $data['content'] = $this->content;
        $data['instructions'] = $this->instructions;
        $data['discount'] = $this->discount;
        $data['status'] = $this->status;
        


        // if ($this->image) {
        //     $image = $this->image->store('files', 'public');
        // }


        // $data['image'] = $image;

      
        Items::where('id',$this->urlID)->update($data);
        session()->flash('message', 'item updated  successfully');
        $this->resetAll();
        $this->redirect('/manageitem');
       


    }



}
