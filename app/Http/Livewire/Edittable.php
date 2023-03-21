<?php

namespace App\Http\Livewire;

use App\Models\Table;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;

class Edittable extends Component
{
   public $edit_table_id=null;
   public $name;
   public $description;
   public $rest_id;
   public $qrcode;

    public function mount($id){

       
        $existingtable = Table::find($id);
        $this->edit_table_id = intval($existingtable->id);

        $this->name = $existingtable->name;
        $this->description = $existingtable->description;
        
    }

    public function update(){

     $this->validate([
         'name'=>'required',
         'description'=>'required',
     ]);

     $data['name']=$this->name;
     $data['description']=$this->name;
     $data['rest_id']=Auth()->user()->id;

     $path = public_path('assets/qrcode/' . time() . '.svg');
        $image = QrCode::size(100)
            ->generate("https://www.google.com/", $path);

            $data['qrcode']= $path;

     
       
   
     Table::where('id',$this->edit_table_id)->update($data);
        session()->flash('message','Table updated Successfully');
        // $this->resetAll();
        // $this->emit("student added");

    }
}
