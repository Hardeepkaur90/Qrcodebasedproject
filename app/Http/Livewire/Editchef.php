<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use App\Models\User;
use Livewire\Component;

class Editchef extends Component
{
    use WithFileUploads;

    public $name,$email,$password,$profile,$profile1, $status,$phone,$location,$image,$chef_u_id;

    public function mount($id)
    {

        $existingchef = User::find($id);
       
        $this->name=$existingchef->name;
        $this->email=$existingchef->email;
        $this->phone=$existingchef->phone;
        $this->location=$existingchef->location;
        $this->profile=$existingchef->profile;
        $this->profile1=$existingchef->profile;
        if($existingchef->status =='Active'){
            $this->status='Active';
        }else{
            $this->status='Passive';
        }
     
        $this->chef_u_id = $existingchef->id;
    
 }

 public function edit(){

   

    $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
           
        ]);
       $url=null;
        if($this->profile != $this->profile1){
            $url = $this->profile->store('profiles','public');
          }
        $data['profile'] = $url ? $url: $this->profile1;
        $data['name'] = $this->name;
        $data['status'] = $this->status;
        $data['phone'] = $this->phone;
        $data['location'] = $this->location;
       
     

        User::where('id',$this->chef_u_id)->update($data);
        session()->flash('message', 'chef info updated successfully');
       
       
    }

}
