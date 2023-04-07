<?php

namespace App\Http\Livewire\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Login extends Component
{

    public $email='';
    public $password='';

    protected $rules= [
        'email' => 'required|email',
        'password' => 'required'

    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function mount() {
      
        $this->fill(['email' => 'admin@material.com', 'password' => 'secret']);    
    }
    
    public function store()
    {
       
        $attributes = $this->validate();

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

         $status= Auth::user()->status;

         if($status == 'Active'){
            session()->regenerate();
            return redirect('/dashboard');
         }else{
            return Redirect::back()->withErrors(['msg' => 'Your status is not active']);
         }

      

    }
}
