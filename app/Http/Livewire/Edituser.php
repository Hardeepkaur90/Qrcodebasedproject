<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Edituser extends Component
{
    public $name,$email,$phone,$location,$profile,$role,$password,$rest_id ,$user_u_id;


    public function mount($id)
    {

        $existinguser = User::find($id);
        $this->name=$existinguser->name;
        $this->email=$existinguser->email;
        $this->phone=$existinguser->phone;
        $this->location=$existinguser->location;
        $this->role=$existinguser->role;

        $this->user_u_id = $existinguser->id;
    
 }

 public function update(){

    $validatedData = $this->validate([
        'name'=>['required'],
        'email'=>['required'],
        'phone'=>['required'],
        'location'=>['required'],
        'role'=>['required'],
        
       
    ]);


    $data['name'] = $this->name;
    $data['email'] = $this->email;
    $data['phone'] = $this->phone;
    $data['location'] = $this->location;
    $data['role'] = $this->role;

  
    User::where('id',$this->user_u_id)->update($data);
    session()->flash('message', 'user updated successfully');
 
    $this->redirect('/manageuser');
   
 }


//     public function render()
//     {
//         return view('livewire.edituser');
//     }
 }
