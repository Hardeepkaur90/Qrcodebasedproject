<?php

namespace App\Http\Livewire\ExampleLaravel;
use App\Models\User;

use Livewire\Component;

class UserManagement extends Component
{
    public function render()
    {

        return view('livewire.example-laravel.adduser');
    //    $users =  User::get();
    //    return view('livewire.example-laravel.user-management', compact("users"));
       
    }

    public function adduser(){
       
      return view('livewire.example-laravel.adduser');
 }

 


}
