<?php

namespace App\Http\Livewire\ExampleLaravel;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
class UserProfile extends Component
{

    public User $user;
    use WithFileUploads;
    public $profile1;

    protected function rules(){
        return [
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,'.$this->user->id,
            'user.phone' => 'required|max:10',
            'user.profile'=>'required',
            'user.about' => 'required:max:150',
            'user.location' => 'required'
        ];
    }

    public function mount() { 
        $this->user = auth()->user();
    }

    public function updated($propertyName){

       $this->profile1 = $this->validateOnly($propertyName);
       
    }
    
    public function update()
    {
     $this->validate();

        // if (env('IS_DEMO') && $this->user->id == 1){
            
        //     if( auth()->user()->email == $this->user->email ){
                
        //         $this->user->save();
        //         return back()->withStatus('Profile successfully updated.');
        //     }
            
        //     return back()->with('demo', "You are in a demo version, you can't change the admin email." );
        // };


        if( $this->profile1) {
            $image = $this->profile1['user']['profile']->store('profiles', 'public');
            $data['profile'] = $image;
        }

        $data =User::where('id',$this->user->id)->update($data);

        // $this->user->save();

        // dd($data);

        return back()->withStatus('Profile successfully updated.');
    
}

public function render()
{
    return view('livewire.example-laravel.user-profile');
}

}
