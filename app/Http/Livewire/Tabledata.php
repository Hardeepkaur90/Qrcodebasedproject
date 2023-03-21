<?php

namespace App\Http\Livewire;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Table;
use Livewire\Component;



class Tabledata extends Component
{
    public $name;
    public $description;
    public $rest_id;
    public $qrcode;


    public function resetAll()
    {
        $this->name = '';
        $this->description = '';
    }

    public function store()
    {

       $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',

        ]);
      
        $path = public_path('assets/qrcode/' . time() . '.svg');
        $image = QrCode::size(100)
            ->generate("https://www.google.com/", $path);

        $validatedData['rest_id'] =Auth()->user()->id;
        $validatedData['qrcode'] =$path;

     
       
     Table::create($validatedData);
        session()->flash('message','Table Added Successfully');
        $this->resetAll();
        $this->emit("student added");
    }

    public function render()
    {

        $allTables = Table::where('rest_id',Auth()->user()->id)->get();
        return view('livewire.table',compact("allTables"));
    }

    public function delete($id){
        $role = Table::find($id);
        if($role){
          $role->delete();
        }
        
        $this->redirect('/table');
    }
}
