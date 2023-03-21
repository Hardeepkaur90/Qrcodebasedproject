<?php

namespace App\Http\Livewire;
use App\Models\Items;
use Livewire\Component;

class Managemenu extends Component
{
    public function render()
    {
        $items =Items::where('vendor_id',Auth()->user()->id)->where('status',1)->get();
        return view('livewire.managemenu',compact('items'));
    }
}
