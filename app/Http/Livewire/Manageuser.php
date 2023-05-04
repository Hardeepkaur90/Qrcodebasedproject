<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Manageuser extends Component
{
    public function render()
    {

        $users = User::where('role',4)->get();
        return view('livewire.manageuser', compact('users'));
    }

    public function delete($id)
    {

        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        $this->redirect('/manageuser');
    }

    public function edit($id)
    {
       $this->redirect('edit-user/'. $id);
    }
}
