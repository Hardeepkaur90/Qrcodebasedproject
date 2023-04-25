<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Addchef extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $role =7;
    public $profile;
    public $status="ACTIVE";
    public $phone;
    public $location;
    public $company_id;
    public $image;

   
    public function store(){

        $user = Auth::user();
        $this->company_id = $user->id;
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'role' =>'required',
            'status'=>'required',
            'profile'=>'image|max:1024',
            'company_id'=>'required',
        ]);
    
        $this->image= $this->profile->store('imagetesting', 'public');

        // $image = $this->image->store('files','public');
        $validatedData['profile'] = $this->image;
        
        $user = User::create($validatedData);
        session()->flash('message','chef added successfully');
    }

    public function render()
    {
        return view('livewire.addchef');
    }
  
   
}
