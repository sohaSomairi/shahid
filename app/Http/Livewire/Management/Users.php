<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\usergroups as usergroupsModel;
use App\Models\Roles as rolesModel;
use App\Models\User as usersModel;
use App\Models\Grouprole as grouprolesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Users extends Component
{
    public $title;
    public $name;
    public $username;
    public $password;
    public $password_confirmation;
    public $roles_id;
    public $usergroups_id;
    public $users_id;
    public $usergroups;
    public $usergroup;
    public $roles;
    public $role;
    public $users;
    public $user;
    public $grouproles;
    public $insertedUser;
    public $insertedRole;
    public function render()
    {
        return view('livewire.management.users');
    }
    public function mount($localtitle)
    {
        $this->title = $localtitle;
        $this->usergroups = usergroupsModel::all();
        $this->roles=rolesModel::all();
        $this->users = usersModel::where('id','!=',Auth::user()->id)->get();

        $this->grouproles = grouprolesModel::join('users', 'grouproles.usergroups_id', '=', 'users.usergroups_id')
        ->where('users.id',Auth::user()->id)->get(['grouproles.roles_id','grouproles.usergroups_id']);
    }

    public function setUser($id){
        $this->user = usersModel::find($id);
        $this->usergroups_id = $this->user->usergroups_id;
    }

    public function saveUser(){
        $this->validate([
            'name' => 'required',
            'username' => 'required | unique:users' ,
            'usergroups_id' => 'required ',
            'password' => 'required |confirmed ',
            'password_confirmation' => 'required',
    ]);
       $this->usergroup = usergroupsModel::find($this->usergroups_id);

       if($this->usergroup){
          $this->insertedUser= usersModel::create([
            'name' => $this->name ,
            'username' => $this->username ,
            'usergroups_id' => $this->usergroups_id,
            'password' => Hash::make($this->password),
           ]);



       }
       $this->user = null;
       $this->name =null;
       $this->username =null;
       $this->password =null;
       $this->usergroups_id=null;
       session()->flash('message', 'تمت عملية الإضافة بنجاح');
       $this->users = usersModel::where('id','!=',Auth::user()->id)->get();

    }

    public function editUserPassword(){
        $this->validate([
        'password' => 'required |confirmed ',
        'password_confirmation' => 'required']);
        if($this->password !=""){
            $this->user->password =  Hash::make($this->password);
        }
        $this->usergroups_id=null;
        session()->flash('message', 'تمت عملية تغيير كلمة المرور بنجاح');
        $this->users = usersModel::where('id','!=',Auth::user()->id)->get();
    }
    public function editUserGroup(){
        $this->validate([
        'usergroups_id' => 'required',
        ]);
        $this->user->usergroups_id = $this->usergroups_id;
        $this->user->save();

        $this->usergroups_id=null;
        session()->flash('message', 'تمت عملية التعديل بنجاح');
        $this->users = usersModel::where('id','!=',Auth::user()->id)->get();
    }

    public function deletUser(){
        $this->user->delete();
        $this->user = null;
        $this->name =null;
        $this->username =null;
        $this->password =null;
        $this->usergroups_id=null;
        session()->flash('message', 'تمت عملية الحذف بنجاح');

        $this->users = usersModel::where('id','!=',Auth::user()->id)->get();
    }

}
