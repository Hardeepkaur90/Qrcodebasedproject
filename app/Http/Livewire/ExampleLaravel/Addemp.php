<?php

namespace App\Http\Livewire\ExampleLaravel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\role;
use App\Models\User;
use Validator;

use Livewire\Component;

class Addemp extends Component
{
    public function render()
    {   $users = User::where('role',10)->get();
        $category = role::get();
        return view('livewire.example-laravel.addemp',compact("category",'users'));
    }

    public $name;
    public $email;
    public $phone;
    public $location;
    public $profile;
    public $role;
    public $password;
    public $rest_id;
       

    public function resetAll(){
        $this->name ='';
        
       
    }

    public function store(){
        
        $this->rest_id=1;


        $validatedData = $this->validate([
         'name'=>['required'],
         'email'=>['required'],
         'phone'=>['required'],
         'location'=>['required'],
         'role'=>['required'],
         'rest_id'=>['required'],
         'password'=>['required']
        
     ]);
     User::create($validatedData);
     session()->flash('message','User added successfully');
     $this->Reset();
     $this->redirect('/manageuser');
}

public function delete($id){
    $role = User::find($id);
    if($role){
      $role->delete();
    }
    
    $this->redirect('/user-management');
 }
}
