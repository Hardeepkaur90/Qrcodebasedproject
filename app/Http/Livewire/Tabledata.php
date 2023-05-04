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
       $validatedData['rest_id'] =Auth()->user()->id;
      $table_data=Table::create($validatedData);


    $path = public_path('assets/qrcode/' . time() . '.svg');
        $image = QrCode::size(100)
            ->generate("http://127.0.0.1:8000/dispalymenu/$table_data->id", $path);

        Table::where('id',$table_data->id)
       ->update([
           'qrcode' => $path
        ]);
       

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
