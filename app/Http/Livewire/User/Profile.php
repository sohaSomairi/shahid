<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $title;
    public $me;
    public $password;
    public $password_confirmation;
    public function render()
    {
        return view('livewire.user.profile');
    }

    public function mount($localtitle,$localme){
        $this->title = $localtitle;
        $this->me = $localme;
    }

    public function editPassword(){
        if($this->password == ""){
             $this->validate([
            'password' => 'required |confirmed ',
            'password_confirmation' => 'required']);
        }
            $this->me->password =  Hash::make($this->password);
            $this->me->save();
            session()->flash('message', 'تمت عملية تغيير كلمة المرور بنجاح');
            $this->password = null;
            $this->password_confirmation = null;
    }
}
