<?php

namespace App\Http\Livewire\ExampleLaravel;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public $user;
    public $profile;
    public $name;
    public $email;
    public $phone;
    public $about;
    public $location;
    public $image;

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'phone' => 'required|max:10',
            'profile' => 'image|max:1024',
            'about' => 'required:max:150',
            'location' => 'required'
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->profile = $this->user->profile;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->about = $this->user->about;
        $this->location = $this->user->location;
    }



    public function update()
    {
        $data['name'] =  $this->name;
        $data['email'] =  $this->email;
        $data['phone'] =  $this->phone;
        $data['about'] =  $this->about;
        $data['location'] =  $this->location;

       
        if ($this->profile != $this->user->profile) {
            $this->image = $this->profile->store('profiles', 'public');
                
        $data['profile'] = $this->image;
        }
   
        $data = User::where('id', $this->user->id)->update($data);
        return back()->withStatus('Profile successfully updated.');
    }

    public function render()
    {
        return view('livewire.example-laravel.user-profile');
    }
}
